<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class DiscordOAuthController extends Controller
{
    public function show()
    {
        return view('account.discord');
    }

    public function redirectToDiscord()
    {
        $query = http_build_query([
            'client_id'     => config('services.discord.client_id'),
            'redirect_uri'  => config('services.discord.redirect'),
            'response_type' => 'code',
            'scope'         => 'identify',
            'state'         => Crypt::encryptString(auth()->id()), // Encrypted user ID
        ]);

        return redirect("https://discord.com/api/oauth2/authorize?$query");
    }

    public function handleCallback(Request $request)
    {
        try {
            $userId = Crypt::decryptString($request->query('state'));
            $user   = User::findOrFail($userId);
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Invalid or expired link. Please try again.');
        }

        Auth::login($user); // Re-authenticate user

        // Step 1: Exchange code for access token
        $tokenResponse = Http::asForm()->post('https://discord.com/api/oauth2/token', [
            'client_id'     => config('services.discord.client_id'),
            'client_secret' => config('services.discord.client_secret'),
            'grant_type'    => 'authorization_code',
            'code'          => $request->code,
            'redirect_uri'  => config('services.discord.redirect'),
            'scope'         => 'identify',
        ]);

        $tokenData = $tokenResponse->json();

        if (!isset($tokenData['access_token'])) {
            return redirect()->route('account.discord')->with('error', 'Failed to retrieve access token.');
        }

        // Step 2: Get Discord user info
        $discordUser = Http::withHeaders([
            'Authorization' => 'Bearer ' . $tokenData['access_token'],
        ])->get('https://discord.com/api/users/@me')->json();

        // Step 3: Update user record
        $user->discord_id = $discordUser['id'] ?? null;
        $user->save();

        $channelId = config('services.discord.channel_id');
        $botToken  = config('services.discord.bot_token');

        $response = Http::withHeaders([
            'Authorization' => 'Bot ' . $botToken,
            'Content-Type'  => 'application/json',
            ])->post("https://discord.com/api/v10/channels/{$channelId}/messages", [
            'content' => "✅ The Dev account \"{$user->username}\" is now linked to your Discord account <@{$user->discord_id}>.",
        ]);

// Optional: log the response for debugging
\Log::info('Discord channel post response', ['response' => $response->json()]);


        return redirect()->route('account.discord')->with('success', 'Discord account linked successfully!');
    }

    public function unlink(Request $request)
    {
        $user = Auth::user();
        $user->discord_id = null;
        $user->save();

        return redirect()->route('account.discord')->with('success', 'Your Discord account has been unlinked.');
    }
}

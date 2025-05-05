<?php

namespace App\Http\Controllers\Housekeeping\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PasswordRestoreController extends Controller
{
    public function showRestoreForm()
    {
        logHousekeepingActivity("User: " . Auth::user()->username . " has view the Password Reset Tool");

        return view('housekeeping.admin.passwordrestore');
    }

    public function restore(Request $request)
    {
        $request->validate([
            'username' => 'required|string|exists:users,username',
            'email' => 'nullable|email',
            'subject' => 'required|string',
            'customMessage' => 'nullable|string',
        ]);

        // Find the user by username
        $user = User::where('username', $request->username)->firstOrFail();

        // Generate a temporary password
        $tempPassword = str::random(8); // Laravel 7 and earlier: use Str::random(8)

        // Hash and update the password
        $user->password = Hash::make($tempPassword);

        // Update email if provided
        if ($request->email) {
            $user->email = $request->email;
        }

        $user->save();

        // Prepare email content
        $message = $request->customMessage ?? 'Your password has been reset. Here is your new password:';
        $content = [
            'title' => 'Password Reset Notification',
            'body' => $message,
            'tempPassword' => $tempPassword,
        ];

        // Send email using Mail facade
        Mail::send('emails.password-restore', $content, function ($mail) use ($user, $request) {
            $mail->to($user->email)
                ->subject($request->subject);
        });

        logHousekeepingActivity("User: " . Auth::user()->username . " has restored the account for User: " . $user->username . " (User ID: " . $user->id . ")");
        return redirect()->back()->with('temp_password', $tempPassword);
    }
}

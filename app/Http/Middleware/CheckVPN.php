<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class CheckVPN
{
    public function handle(Request $request, Closure $next)
    {  
        $userIp = $request->ip(); // Get the user's IP

        // ✅ Check if IP is whitelisted in the client_whitelist table
        $isWhitelisted = DB::table('client_whitelist')->where('ip_address', $userIp)->exists();

        if ($isWhitelisted) {
            return $next($request); // ✅ Allow access if whitelisted
        }

        // Call VPN detection API (Using IPQualityScore as an example)
        $response = Http::get("https://www.ipqualityscore.com/api/json/ip/gPYffqmCk4QzKlzxFnpEnL38ab8lTIk4/{$userIp}");

        if ($response->successful()) {
            $data = $response->json();

            // Uncomment this to debug the API response
            // dd($data);

            // ❌ Block if the IP is flagged as a VPN, proxy, or suspicious
            if (!empty($data['active_vpn']) && $data['active_vpn'] === true) {
                return redirect()->route('client.blocked'); // Redirect to VPN warning page
            }
        }

        return $next($request); // ✅ Allow access if not flagged as a VPN
    }
}

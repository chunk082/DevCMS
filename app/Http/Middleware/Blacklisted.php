<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Blacklisted
{
    public function handle(Request $request, Closure $next)
    {
        $userIp = $request->ip();
        Log::info("Checking Blacklist for IP: " . $userIp);

        // Check if the IP is blacklisted
        $blacklisted = DB::table('website_blacklist')->where('ip_address', $userIp)->exists();

        if ($blacklisted) {
            Log::warning("Blocked IP: " . $userIp);
            abort(403, 'Forbidden - Your IP has been blacklisted.');
        }

        return $next($request);
    }
}
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ReAuthenticate
{
    public function handle($request, Closure $next)
{
    if ($request->is('client') && Auth::check()) {
        $lastAuthenticated = session('client_last_authenticated_at', now());
        $timeout = 60;

        if (Carbon::parse($lastAuthenticated)->diffInMinutes(now()) >= $timeout) {
            session()->forget('client_last_authenticated_at');
            return redirect('/client/authenticate')->with('warning', 'Please re-authenticate to continue.');
        }

        // ✅ Only update if timeout hasn't passed
        session(['client_last_authenticated_at' => now()]);
    }

    return $next($request);
}
}
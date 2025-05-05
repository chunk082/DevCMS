<?php

namespace App\Http\Middleware\Housekeeping;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class HousekeepingAuthenticate
{
    public function handle($request, Closure $next)
{
    if (!Auth::guard('housekeeping')->check()) {
        Log::warning('Housekeeping guard not authenticated.');
        return redirect()->route('housekeeping.login');
    }

    // Set the housekeeping user as the default Auth context user
    Auth::setUser(Auth::guard('housekeeping')->user());

    Log::info('Housekeeping guard authenticated:', ['user' => Auth::user()]);
    return $next($request);
    }
}
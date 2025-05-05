<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ClientReAuthenticate
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $lastAuthenticated = session('client_last_authenticated_at');

            if (!$lastAuthenticated || now()->diffInMinutes($lastAuthenticated) > 60) {
                session(['url.intended' => $request->url()]);
                return redirect()->route('client.authenticate');
            }
        }

        return $next($request);
    }
}

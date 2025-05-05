<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OnlineUsersMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $onlineUsersCount = User::where('online', 1)->count(); 

        // Pass $onlineUsersCount to all views
        view()->share('onlineUsersCount', $onlineUsersCount);

        return $next($request);
    }
}

<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Alias Middleware
        $middleware->alias([
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
            'redirectAuthenticated' => \App\Http\Middleware\RedirectIfAuthenticated::class,
            'redirectUnauthenticated' => \App\Http\Middleware\RedirectIfUnauthenticated::class,
            'reauthenticate' => App\Http\Middleware\ReAuthenticate::class,
            'check.vpn' => \App\Http\Middleware\CheckVPN::class,
            'hknotification' => \App\Http\Middleware\Housekeeping\HousekeepingNotification::class,
            'check.hk' => \App\Http\Middleware\Housekeeping\HousekeepingPermissions::class,
            'blacklisted' => \App\Http\Middleware\Blacklisted::class,
        ]);
      
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

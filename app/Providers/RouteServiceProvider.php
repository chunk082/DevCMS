<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/me';

    /**
     * Define your route model bindings, pattern filters, etc.
     */
    public function boot(): void
    {
        $this->configureRateLimiting();

        // Register middleware aliases
        Route::aliasMiddleware('client.reauthenticate', \App\Http\Middleware\ClientReAuthenticate::class);

        $this->routes(function () {
            // Default web routes
            Route::middleware(['web', 'auth'])
                ->group(base_path('routes/web.php'));

            // API routes
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            // Client-specific routes
            Route::middleware(['web', 'auth', 'client.reauthenticate'])
                ->prefix('client')
                ->group(function () {
                    // Nitro client route
                    Route::get('/', [\App\Http\Controllers\NitroController::class, '__invoke'])
                        ->name('nitro-client');

                    // Client authentication routes
                    Route::match(['get', 'post'], '/authenticate', [\App\Http\Controllers\ClientAuthenticateController::class, 'handle'])
                        ->name('client.authenticate');
                });
        });
    }

    /**
     * Configure the rate limiters for the application.
     */
    protected function configureRateLimiting(): void
    {
        // Define rate limiting logic here
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;
use App\Http\Middleware\CheckMaintenanceMode;
use App\Models\User;
use App\Models\WebsiteSetting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
{
    // Share data across all views
    View::composer('*', function ($view) {
        $onlineUsers = User::where('online', '1')->get();
        $onlineUserCount = $onlineUsers->count();
        $currentTheme = WebsiteSetting::getTheme();
        $maintenanceMode = WebsiteSetting::isMaintenanceModeEnabled();

        $view->with('onlineUsers', $onlineUsers)
             ->with('online_user_count', $onlineUserCount)
             ->with('currentTheme', $currentTheme)
             ->with('maintenanceMode', $maintenanceMode);
    });

    // Push maintenance middleware
    $router = $this->app['router'];
    $router->pushMiddlewareToGroup('web', \App\Http\Middleware\CheckMaintenanceMode::class);

    // 🛠️ Force secure session cookie config
    Config::set('session.same_site', 'none');
    Config::set('session.secure', true);
}

}
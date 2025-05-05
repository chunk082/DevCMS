<?php 

if (!function_exists('hasPermission')) {
    function hasPermission(string $permission): bool
    {
        return app(\App\Services\PermissionsService::class)->hasPermission($permission);
    }
}
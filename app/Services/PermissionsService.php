<?php

namespace App\Services;

    class PermissionsService
{
    protected $permissions;

    public function __construct()
    {
        // Cache permissions on service construction
        $this->permissions = HousekeepingPermission::all()->pluck('min_rank', 'permission');
    }

    public function hasPermission(string $permission): bool
    {
        if (!$this->permissions->has($permission)) {
            return false;
        }

        $minRank = $this->permissions->get($permission);
        return Auth::check() && Auth::user()->rank >= $minRank;
    }
}
}

<?php

use App\Models\Housekeeping\HousekeepingActivityLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

if (!function_exists('logHousekeepingActivity')) {
    function logHousekeepingActivity($action)
    {
        HousekeepingActivityLog::create([
            'staff_user_id' => Auth::id(),           // ID of the staff user
            'ip_address' => Request::ip(),           // IP address of the staff user
            'action_performed' => $action,           // Description of the action
        ]);
    }
}
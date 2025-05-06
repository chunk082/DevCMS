<?php

namespace App\Http\Controllers\Housekeeping\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebsiteSetting;

class MaintenanceController extends Controller
{
    public function index()
    {
    
        $maintenanceMode = WebsiteSetting::isMaintenanceModeEnabled();

        return view('housekeeping.website.maintenance', compact('maintenanceMode'));
    }

    public function updateMaintenance(Request $request)
{
    $messages = [];

    $maintenanceMode = $request->input('maintenance_mode') === 'true' ? 'true' : 'false';

    // Update the key-value setting
    \App\Models\WebsiteSetting::updateOrCreate(
        ['key' => 'maintenance_mode'],
        ['value' => $maintenanceMode]
    );

    $messages[] = $maintenanceMode === 'true'
        ? 'You have enabled Maintenance Mode!'
        : 'You have disabled Maintenance Mode!';

    logHousekeepingActivity("User: " . auth()->user()->username . " has " . ($maintenanceMode === 'true' ? 'enabled' : 'disabled') . " Maintenance Mode.");

    return redirect()->route('housekeeping.admin.maintenance')->with('success', implode(' ', $messages));
}

}


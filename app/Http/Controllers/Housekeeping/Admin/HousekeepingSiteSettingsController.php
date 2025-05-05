<?php

namespace App\Http\Controllers\Housekeeping\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebsiteSetting;

class HousekeepingSiteSettingsController extends Controller
{
    public function index()
    {
        // Retrieve settings
        $staffApplicationTabVisible = WebsiteSetting::isStaffApplicationTabVisible();
        $maintenanceMode = WebsiteSetting::isMaintenanceModeEnabled();
        $currentTheme = WebsiteSetting::getTheme(); // Fetch the current theme from the database

        return view('housekeeping.admin.sitesettings', compact('staffApplicationTabVisible', 'maintenanceMode', 'currentTheme'));
    }

    public function updateSiteSettings(Request $request)
    {
        $messages = [];

        // Handle Staff Application Tab Visibility
        $staffApplicationTabVisible = $request->input('staff_application_tab_visible');
        if (WebsiteSetting::isStaffApplicationTabVisible() != $staffApplicationTabVisible) {
            WebsiteSetting::updateStaffApplicationTab($staffApplicationTabVisible);
            $messages[] = $staffApplicationTabVisible == 'true' ? 'You have enabled Staff Applications!' : 'You have disabled Staff Applications!';
            logHousekeepingActivity("User: " . auth()->user()->username . " has " . ($staffApplicationTabVisible == 'true' ? 'enabled' : 'disabled') . " Staff Application Tab.");
        }

        // Combine the messages into a single string
        $successMessage = implode(' ', $messages);

        return redirect()->route('housekeeping.admin.sitesettings')->with('success', $successMessage);
    }
}

<?php

namespace App\Http\Controllers\Housekeeping\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebsiteSetting;

class WebTabsController extends Controller
{
    public function index()
    {
        // Retrieve settings
        $staffApplicationTabVisible = WebsiteSetting::isStaffApplicationTabVisible();
        $trialModeratorView = WebsiteSetting::isTrialModView();

        return view('housekeeping.admin.webtabs', compact('staffApplicationTabVisible', 'trialModeratorView'));
    }

    public function updateWebTabs(Request $request)
    {
        $messages = [];

        // Handle Staff Application Tab Visibility
        $staffApplicationTabVisible = $request->input('staff_application_tab_visible');
        if (WebsiteSetting::isStaffApplicationTabVisible() != $staffApplicationTabVisible) {
            WebsiteSetting::updateStaffApplicationTab($staffApplicationTabVisible);
            $messages[] = $staffApplicationTabVisible == 'true' ? 'You have enabled Staff Applications!' : 'You have disabled Staff Applications!';
            logHousekeepingActivity("User: " . auth()->user()->username . " has " . ($staffApplicationTabVisible == 'true' ? 'enabled' : 'disabled') . " Staff Application Tab.");
        }

        // Handles the Trial Mod Section on the Staff Page
        $trialModView = $request->input('trial_moderator_view');
            if (WebsiteSetting::isTrialModView() != $trialModView) {
            WebsiteSetting::updateTrialModView($trialModView);
            $messages[] = $trialModView == 'true' ? 'You have enabled Trial Moderator section!' : 'You have disabled Trial Moderator section!';
            logHousekeepingActivity("User: " . auth()->user()->username . " has " . ($trialModView == 'true' ? 'enabled' : 'disabled') . " Trial Moderator view.");
        }

        // Combine the messages into a single string
        $successMessage = implode(' ', $messages);

        return redirect()->route('housekeeping.admin.webtabs')->with('success', $successMessage);
    }
}



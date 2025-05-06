<?php

namespace App\Http\Controllers\Housekeeping\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebsiteSetting;

class WebTabsController extends Controller
{
    public function index()
    {
        return view('housekeeping.admin.webtabs', [
            'staffApplicationTabVisible' => WebsiteSetting::isStaffApplicationTabVisible(),
            'trialModeratorView' => WebsiteSetting::isTrialModView()
        ]);
    }

    public function updateWebTabs(Request $request)
    {
        $messages = [];

        // Handle Staff Application Tab toggle
        $staffTab = $request->input('staff_application_tab_visible') === 'true' ? 'true' : 'false';
        if (WebsiteSetting::isStaffApplicationTabVisible() != ($staffTab === 'true')) {
            WebsiteSetting::updateStaffApplicationTab($staffTab);
            $messages[] = $staffTab === 'true'
                ? 'You have enabled the Staff Applications tab.'
                : 'You have disabled the Staff Applications tab.';
            logHousekeepingActivity("User: " . auth()->user()->username . " has " . ($staffTab === 'true' ? 'enabled' : 'disabled') . " the Staff Applications tab.");
        }

        // Handle Trial Moderator View toggle
        $trialMod = $request->input('trial_moderator_view') === 'true' ? 'true' : 'false';
        if (WebsiteSetting::isTrialModView() != ($trialMod === 'true')) {
            WebsiteSetting::updateTrialModView($trialMod);
            $messages[] = $trialMod === 'true'
                ? 'You have enabled Trial Moderator View.'
                : 'You have disabled Trial Moderator View.';
            logHousekeepingActivity("User: " . auth()->user()->username . " has " . ($trialMod === 'true' ? 'enabled' : 'disabled') . " Trial Moderator View.");
        }

        return redirect()
            ->route('housekeeping.admin.webtabs')
            ->with('success', implode(' ', $messages));
    }
}

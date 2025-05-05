<?php

namespace App\Http\Controllers\Housekeeping\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebsiteSetting;

class ThemeController extends Controller
{
    public function index()
    {
        $currentTheme = WebsiteSetting::getTheme();
        return view('housekeeping.admin.theme', compact('currentTheme'));
    }

    public function update(Request $request)
    {
        $theme = $request->input('theme');
        $messages = [];

        if (WebsiteSetting::getTheme() !== $theme) {
            WebsiteSetting::setTheme($theme);
            $messages[] = "Theme has been updated to " . ucfirst($theme) . "!";

            // Trigger build
            if (WebsiteSetting::buildTheme($theme)) {
                $messages[] = "NPM build succeeded!";
            } else {
                $messages[] = "Failed to build the theme. Please check the logs.";
            }

            logHousekeepingActivity("User: " . auth()->user()->username . " updated the theme to " . ucfirst($theme) . ".");
        } else {
            $messages[] = "No changes were made. Theme is already " . ucfirst($theme) . ".";
        }

        return redirect()->route('housekeeping.admin.theme')->with('success', implode(' ', $messages));
    }
}

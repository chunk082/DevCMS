<?php

namespace App\Http\Controllers\Housekeeping\Emulator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EmulatorSettingsController extends Controller
{
    /**
     * Display the emulator settings.
     */
    public function index(Request $request)
    {
        $query = DB::table('emulator_settings');

        // Filtering logic (optional)
        if ($request->has('filter') && $request->filter) {
            $query->where('key', 'like', '%' . $request->filter . '%')
                  ->orWhere('value', 'like', '%' . $request->filter . '%');
        }

        $settings = $query->paginate(10);

        logHousekeepingActivity("User: " . Auth::user()->username . " has view the Emulator Settings pages.");
        return view('housekeeping.emulator.settings', compact('settings'));
    }

    /**
     * Update a specific setting.
     */
    public function update(Request $request, $key)
{
    $key = urldecode($key); // Decode the key parameter

    $request->validate([
        'value' => 'required|string|max:512',
    ]);

    DB::table('emulator_settings')
        ->where('key', $key)
        ->update(['value' => $request->value]);

        logHousekeepingActivity("User: " . Auth::user()->username . " has update the Emulator settings.");

    return redirect()->route('housekeeping.emulator.settings.index')
        ->with('success', 'Setting updated successfully.');
}
}

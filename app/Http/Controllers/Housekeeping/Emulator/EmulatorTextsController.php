<?php

namespace App\Http\Controllers\Housekeeping\Emulator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EmulatorTextsController extends Controller
{
    /**
     * Display the emulator texts.
     */
    public function index(Request $request)
    {
        $query = DB::table('emulator_texts');

        // Filtering logic (optional)
        if ($request->has('filter') && $request->filter) {
            $query->where('key', 'like', '%' . $request->filter . '%')
                  ->orWhere('value', 'like', '%' . $request->filter . '%');
        }

        $texts = $query->paginate(10);

        logHousekeepingActivity("User: " . Auth::user()->username . " has view the Emulator Text pages.");

        return view('housekeeping.emulator.texts', compact('texts'));
    }

    /**
     * Update a specific text.
     */
    public function update(Request $request, $key)
    {
        $key = urldecode($key); // Decode the key parameter

        $request->validate([
            'value' => 'required|string|max:512',
        ]);

        DB::table('emulator_texts')
            ->where('key', $key)
            ->update(['value' => $request->value]);

            logHousekeepingActivity("User: " . Auth::user()->username . " has updated the Emulator Text.");

        return redirect()->route('housekeeping.emulator.texts.index')
            ->with('success', 'Text updated successfully.');
    }
}

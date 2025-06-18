<?php

namespace App\Http\Controllers\Housekeeping\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class SyncBadgesController extends Controller
{
    public function index()
    {
        return view('housekeeping.admin.syncbadges');
    }

    public function runHabboSync()
    {
        Artisan::call('habbo:sync-badges', ['--format' => 'gif']);
        $output = Artisan::output();

        logHousekeepingActivity(auth()->user()->username . ' synced Habbo badges');

        return redirect()->back()
            ->with('consoleOutput', $output)
            ->with('success', '✅ Habbo badge sync completed.');
    }

    public function runHabboonSync()
{
    Artisan::queue('habboon:sync-badges');

    logHousekeepingActivity(auth()->user()->username . ' queued Habboon badge sync');

    return redirect()->back()
        ->with('success', '⏳ Habboon badge sync has started in the background. Check back later.');
}


    public function run(\Illuminate\Http\Request $request)
    {
        $source = $request->input('source');

        if ($source === 'habbo') {
            return $this->runHabboSync();
    }

        if ($source === 'habboon') {
            return $this->runHabboonSync();
    }

        return redirect()->back()->with('error', 'Invalid sync source.');
    }

}

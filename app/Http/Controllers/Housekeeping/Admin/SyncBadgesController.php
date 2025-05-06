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
        Artisan::call('habboon:sync-badges');
        $output = Artisan::output();

        logHousekeepingActivity(auth()->user()->username . ' synced Habboon badges');

        return redirect()->back()
            ->with('consoleOutput', $output)
            ->with('success', '✅ Habboon badge sync completed.');
    }
}

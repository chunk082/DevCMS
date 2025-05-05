<?php

namespace App\Http\Controllers\Housekeeping\Admin;

use Illuminate\Http\Request;

use App\Models\Housekeeping\HousekeepingActivityLog;
use App\Http\Controllers\Controller;

class HousekeepingActivityLogController extends Controller
{
    public function index(Request $request)
{
    $query = HousekeepingActivityLog::with('user')->latest();

    // Filter logs by rank (minimum 5)
    $query->whereHas('user', function ($q) {
        $q->where('rank', '>=', 5);
    });

    // Filter logs by staff username if provided
    if ($request->has('staff') && $request->staff) {
        $staff = $request->staff;
        $query->whereHas('user', function ($q) use ($staff) {
            $q->where('username', 'like', '%' . $staff . '%');
        });
    }

    $logs = $query->paginate(20);

    return view('housekeeping.admin.activitylog', compact('logs'));
}
}
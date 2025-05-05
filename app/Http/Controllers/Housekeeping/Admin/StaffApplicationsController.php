<?php

namespace App\Http\Controllers\Housekeeping\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\RconService;
use Illuminate\Support\Facades\Auth;
use App\Models\Housekeeping\StaffApplications; // Import the model with the new namespace
use App\Models\User; // Import User model if needed

class StaffApplicationsController extends Controller
{

    protected $rconService;

    public function __construct(RconService $rconService)
    {
        $this->rconService = $rconService;
    }

    public function index()
    {
        $applications = StaffApplications::all(); // Retrieve all staff applications
        logHousekeepingActivity("User: " . Auth::user()->username . " has view the Staff Application");
        return view('housekeeping.admin.staffapps', compact('applications'));
    }

   public function promote(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'rank' => 'required|integer|min:4|max:7'
    ]);

    // Find the user based on the provided user_id
    $user = User::findOrFail($request->user_id);
    $rank = $request->rank;

    // Update the user's rank in the database
    $user->rank = $rank;
    if ($user->save()) {
        // Log success message
        \Log::info("User {$user->username} promoted to rank {$rank}.");

        // Call the RCON function to set the rank in the hotel system (uncomment if RCON service is ready)
        $this->rconService->setRank($user, $rank);

        // Get the rank title based on the rank value
        $rankTitle = $rankTitles[$rank] ?? 'Unknown Rank';

        // Log the promotion with the rank title
        logHousekeepingActivity("User: " . Auth::user()->username . " has promoted: " . $user->username . " to " . $rankTitle);

        // Delete the application after successful promotion
        $application = StaffApplications::where('user_id', $user->id)->first();
        if ($application) {
            $application->delete();
        }

        return redirect()->back()->with('success', 'User promoted successfully.');
    } else {
        \Log::error("Failed to update rank for user {$user->username}.");
        return redirect()->back()->with('error', 'Failed to promote user.');
    }
}

    public function setRank(User $user, int $rank)
    {
        return $this->sendPacket('setrank', [
            'user_id' => $user->id,
            'rank' => $rank,
        ]);
    }

    public function reject(Request $request)
{
    $request->validate([
        'application_id' => 'required|exists:staff_applications,id',
    ]);

    // Find and delete the application
    $application = StaffApplications::findOrFail($request->application_id);

    // Retrieve the associated user for logging purposes
    $user = User::find($application->user_id); // Ensure you have the correct association

    if ($application->delete()) {
        logHousekeepingActivity("User: " . Auth::user()->username . " has rejected application for: " . ($user ? $user->username : 'Unknown User'));
        return redirect()->back()->with('success', 'Application rejected successfully.');
    } else {
        return redirect()->back()->with('error', 'Failed to reject the application.');
    }
}
}


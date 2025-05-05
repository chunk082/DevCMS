<?php

namespace App\Http\Controllers\Housekeeping\Hotel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Services\RconService;

class GiveBadgeController extends Controller
{
    protected $rconService;

    public function __construct(RconService $rconService)
    {
        $this->rconService = $rconService;
    }

    public function index()
    {
         $assignedBadges = DB::table('users_badges')
        ->join('users', 'users_badges.user_id', '=', 'users.id')
        ->select('users_badges.id', 'users.username', 'users_badges.badge_code')
        ->paginate(20);

        return view('housekeeping.hotel.badges', compact('assignedBadges'));
    }
    // Function to assign a badge to a user
   public function giveBadge(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'username' => 'required|string|exists:users,username',
        'badge_code' => 'required|string|max:50',
    ]);

    // Find the user ID based on the provided username
    $user = User::where('username', $request->input('username'))->firstOrFail();

    if (!$user) {
        return redirect()->back()->withErrors(['username' => 'User not found']);
    }

    // Insert badge into the users_badges table
    DB::table('users_badges')->insert([
        'user_id' => $user->id,
        'slot_id' => 0, // Default slot_id
        'badge_code' => $request->input('badge_code'),
    ]);

    logHousekeepingActivity("Gave badge code: {$request->input('badge_code')} to User: {$user->username}");

    //RCON Service

    $this->rconService->giveBadge($user, $request->input('badge_code'));

    // Sends Alert to the user who is receiving a badge

        $message = "Congratulations, " . $user->username . "! You have received a new badge: " . $request->input('badge_code') . ".";
        $this->rconService->alertUser($user, $message);

    // Redirect or return success response
    return redirect()->back()->with('success', 'Badge assigned successfully!');
}
    

     // Function to delete a user's badge
    public function destroy($id)
{
    // Retrieve the badge and user details before deleting
    $badge = DB::table('users_badges')->where('id', $id)->first();

    if (!$badge) {
        return redirect()->back()->withErrors(['Badge not found.']);
    }

    // Get the user instance
    $user = User::find($badge->user_id);

    if ($user) {
        // Call the RCON service to send the 'takebadge' notification
        $this->rconService->takeBadge($user, $badge->badge_code);

        // Alert the user that the badge was taken away
        $message = "Uh Oh!, " . $user->username . "! We have taken away your badge: " . $badge->badge_code . ".";
        $this->rconService->alertUser($user, $message);

        // Delete the badge from the table
        DB::table('users_badges')->where('id', $id)->delete();

        logHousekeepingActivity("User: " . Auth::user()->username . " has deleted a badge.");
        // Redirect with a success message
        return redirect()->back()->with('success', 'Badge removed successfully and user has been notified.');
    }

    return redirect()->back()->withErrors(['User associated with the badge not found.']);
}
}

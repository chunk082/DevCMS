<?php

namespace App\Http\Controllers\Housekeeping\Hotel;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Ban;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UsersController extends Controller
{
    public function index()
{
    $users = User::paginate(20); // You can adjust the number per page
    return view('housekeeping.users.index', compact('users'));
}


   public function search(Request $request)
    {
    $request->validate([
        'search' => 'required|string|max:255',
    ]);

    $searchTerm = $request->search;

    $users = User::where('username', 'like', '%' . $searchTerm . '%')
                ->orWhere('ip_register', $searchTerm)
                ->get();

    if ($request->ajax()) {
        return response()->json($users);
    }

    logHousekeepingActivity("User: " . Auth::user()->username . " has search for user");
    return view('housekeeping.users.index', compact('users'));
    }

    public function clones(User $user)
    {
    $users = User::query()
        ->select(['id', 'username', 'mail', 'motto', 'rank', 'look', 'online', 'ip_current', 'last_online'])
        ->whereIn('ip_current', [$user->ip_current, $user->ip_register])
        ->orWhereIn('ip_register', [$user->ip_current, $user->ip_register])
        ->paginate(15);

        logHousekeepingActivity("User: " . Auth::user()->username . " searched for Cloned User");
    return view('housekeeping.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        $ranks = Permission::all();
        $currentRank = Permission::find($user->rank);

        //logHousekeepingActivity("User: " . Auth::user()->username . " has edited" . $user->username);
        return view('housekeeping.users.edit', compact('user', 'ranks', 'currentRank'));
    }

    public function update(Request $request, $id)
{
    $user = auth()->user(); // The currently logged-in staff
    $targetUser = User::findOrFail($id); // The user being edited

    // Prevent self-promotion
    if ($user->id === $targetUser->id && $request->rank != $targetUser->rank) {
        return redirect()->back()->with('error', 'You cannot change your own rank.');
    }

    // Prevent demoting someone with a higher rank
    if ($targetUser->rank > $user->rank) {
        return redirect()->back()->with('error', 'You cannot change the rank of a user with a higher rank than you.');
    }

    // Prevent staff from promoting others to ranks above their own
    if ($request->rank > $user->rank) {
        return redirect()->back()->with('error', 'You cannot promote a user to a rank higher than your own.');
    }

    // Prepare data for update (rank excluded unless allowed)
    $data = $request->except(['rank']);
    if ($request->has('rank') && $request->rank <= $user->rank) {
        $data['rank'] = $request->rank;
    }

    // Detect what changed
    $changes = [];

    if ($request->has('username') && $request->username !== $targetUser->username) {
        $changes[] = "username from {$targetUser->username} to {$request->username}";
    }

    if ($request->has('mail') && $request->mail !== $targetUser->mail) {
        $changes[] = "mail from {$targetUser->mail} to {$request->mail}";
    }

    if ($request->has('motto') && $request->motto !== $targetUser->motto) {
        $changes[] = "motto from \"{$targetUser->motto}\" to \"{$request->motto}\"";
    }

    if ($request->has('coins') && $request->coins != $targetUser->credits) {
        $changes[] = "coins from {$targetUser->credits} to {$request->coins}";
    }

    if ($request->has('gotw_points') && $request->gotw_points != $targetUser->gotw_points) {
        $changes[] = "GOTW points from {$targetUser->gotw_points} to {$request->gotw_points}";
    }

    if ($request->has('rank') && $request->rank != $targetUser->rank) {
        $oldRank = Permission::find($targetUser->rank)->rank_name ?? 'Unknown';
        $newRank = Permission::find($request->rank)->rank_name ?? 'Unknown';
        $changes[] = "rank from {$oldRank} to {$newRank}";
    }

    // Perform the update
    $targetUser->update($data);

    // Build and write the log
    $logText = "User: {$user->username} edited {$targetUser->username}";
    if (count($changes)) {
        $logText .= ' — Changed: ' . implode(', ', $changes);
    }

    logHousekeepingActivity($logText);

    return redirect()->back()->with('success', 'User updated successfully.');
}

    public function banUser(Request $request, User $user)
    {
    Log::info('Reached banUser method');

    $request->validate([
        'ban_reason' => 'required|string|max:255',
        'ban_expire' => 'required|date_format:Y-m-d\TH:i',
        'ban_type' => 'required|string|in:account,ip,machine,super', // Add all possible enum values
    ]);

    $userStaffId = Auth::guard('housekeeping')->id();
    if (!$userStaffId) {
        Log::error('User not authenticated or user_staff_id is null');
        return redirect()->route('housekeeping.users.index')->with('error', 'You must be logged in to ban a user.');
    }

    Log::info('Banning user', [
        'user_id' => $user->id,
        'ban_reason' => $request->ban_reason,
        'ban_expire' => strtotime($request->ban_expire),
        'ip' => $request->ban_type === 'ip' ? $user->ip ?? '0.0.0.0' : null,
        'type' => $request->ban_type,
        'user_staff_id' => $userStaffId,
        'timestamp' => time(),
    ]);

    try {
        $ban = Ban::create([
    'user_id' => $user->id,
    'ban_reason' => $request->ban_reason,
    'ban_expire' => strtotime($request->ban_expire),
    'ip' => in_array($request->ban_type, ['ip', 'machine', 'super']) 
        ? ($user->ip_register ?? $user->ip_current ?? $user->ip_last ?? '0.0.0.0') 
        : '0.0.0.0',
    'type' => $request->ban_type,
    'user_staff_id' => $userStaffId,
    'timestamp' => time(),
]);


        logHousekeepingActivity("User: " . Auth::user()->username . " has banned: " . $user->username);

        Log::info('Ban created', ['ban' => $ban]);
    } catch (\Exception $e) {
        Log::error('Error creating ban', ['error' => $e->getMessage()]);
        return redirect()->route('housekeeping.users.index')->with('error', 'Error banning user.');
    }

    return redirect()->route('housekeeping.users.index')->with('success', 'User banned successfully');
    }
}


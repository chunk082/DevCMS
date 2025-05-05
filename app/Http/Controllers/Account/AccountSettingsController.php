<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Models\Account\UserSettings;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountSettingsController extends Controller
{
    public function showPreferences()
{
    $user = Auth::user();

    // Fetch user settings manually instead of relying on the relationship
    $settings = UserSettings::where('user_id', $user->id)->first();

    return view('account.account', compact('settings'));
}

    public function updatePreferences(Request $request)
{
    $user = Auth::user();

    // Validate inputs
    $request->validate([
        'block_friendrequests' => 'nullable|boolean',
        'block_following' => 'nullable|boolean',
        'block_roominvites' => 'nullable|boolean',
    ]);

    // Update the settings individually
    $settings = $user->settings;
    $settings->block_friendrequests = $request->input('block_friendrequests', $settings->block_friendrequests);
    $settings->block_following = $request->input('block_following', $settings->block_following);
    $settings->block_roominvites = $request->input('block_roominvites', $settings->block_roominvites);

    // Save the updated settings
    $settings->save();

    return redirect()->route('account.account')->with('success', 'Preferences updated successfully.');
}

public function showEmailForm()
    {
        return view('account.email', [
            'email' => Auth::user()->email, // Pass the user's current email to the view
        ]);
    }

    public function updateEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
        ]);

        $user = Auth::user();

        // Update the email
        $user->update([
            'email' => $request->email,
        ]);

        return redirect()->route('account.email')->with('success', 'Email updated successfully.');
    }

     public function showUpdatePassword()
    {
        return view('account.password'); // Create a password.blade.php for this view
    }

    // Update the user's password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required', // Current password is required for validation
            'new_password' => 'required|string|min:8|confirmed', // Ensure new password matches confirmation
        ]);

        $user = Auth::user();

        // Check if the current password matches
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The current password does not match our records.']);
        }

        // Update the user's password
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->route('account.password')->with('success', 'Your password has been updated successfully.');
    }
}

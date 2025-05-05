<?php

namespace App\Http\Controllers\Housekeeping;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class HousekeepingAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('housekeeping.login'); // Ensure this view exists
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        Log::info('Attempting login with credentials:', $credentials);

        if (Auth::guard('housekeeping')->attempt($credentials)) {
            Log::info('Login successful for user:', ['username' => $credentials['username']]);
            return redirect()->route('housekeeping.dashboard');
        }

        Log::warning('Login failed for user:', ['username' => $credentials['username']]);
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('housekeeping')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('housekeeping');
    }
}
<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientAuthenticateController extends Controller
{
    /**
     * Show the re-authentication form (GET request).
     */
    public function showForm()
    {
        return view('client.authenticate');
    }

    /**
     * Handle re-authentication (POST request).
     */
    public function handle(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $user = Auth::user();

        if (Hash::check($request->password, $user->password)) {
            // Update the re-authentication timestamp
            session(['client_last_authenticated_at' => now()]);
            
            // Redirect to the intended URL or fallback to /client
            return redirect()->intended('/client')->with('message', 'Successfully authenticated.');
        }

        // If authentication fails, return with error
        return back()->withErrors(['password' => 'The provided password is incorrect.']);
    }
}

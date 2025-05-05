<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    // Redirect to dashboard after login
    protected function authenticated(Request $request, $user)
    {
        return redirect()->route('dashboard'); // Ensure 'dashboard' matches your route name
    }

    // Handle the dashboard view
    public function dashboard()
    {
        return view('dashboard');
    }
}
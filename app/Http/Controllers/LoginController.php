<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('login'); // Assuming your login view file is named "login.blade.php"
    }

    // Handle the login form data
    public function login(Request $request)
    {
        // Validate the form data
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Attempt to log the user in
        if (Auth::attempt(['email' => $request->username, 'password' => $request->password])) {
            // Authentication passed
            $user = Auth::user();
            $request->session()->put('user', $user);
            return redirect('/'); // Redirect to the dashboard or any other desired page
        }

        // Authentication failed
        return back()->withErrors(['username' => 'Invalid credentials']);
    }

    // Logout the user
    public function logout()
    {
        Auth::logout();
        // destroy session
        session()->flush();
        return redirect('/'); // Redirect to the login page after logout
    }
}

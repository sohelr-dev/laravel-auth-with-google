<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function showProfile()
    {
        return view('auth.complete-profile');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'No account found with this email.'])->withInput();
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors(['password' => 'This password is incorrect.'])->withInput();
    }

    public function logout(Request $request)
    {
        // 1. Log the user out of the application
        Auth::logout();

        // 2. Invalidate the user's session
        $request->session()->invalidate();

        // 3. Regenerate the CSRF token to prevent attacks
        $request->session()->regenerateToken();

        // 4. Redirect to login page
        return redirect('/login');
    }
}

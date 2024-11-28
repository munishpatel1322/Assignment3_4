<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show Login Form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // Redirect based on user role
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->intended('admin/dashboard'); // Admin route
            } elseif ($user->role === 'applicant') {
                return redirect()->intended('applicant/dashboard'); // Applicant route
            }

            // Default fallback if role doesn't match
            return redirect('/');
        }

        return back()->with('error', 'Invalid login credentials.');
    }
}

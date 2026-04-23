<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // ✅ ADD THIS

class AuthController extends Controller
{
    public function showSignup()
    {
        return view('auth.signup');
    }

  public function signup(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return redirect('/login')->with('success', 'Account created! Please login.');
}
public function login(Request $request)
{
    // 1. Validate input
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // 2. Attempt login
    if (Auth::attempt([
        'email' => $request->email,
        'password' => $request->password
    ])) {
        // login success
        return redirect('/dashboard')->with('success', 'Login successful!');
    } else {
        // login failed
        return back()->with('error', 'Invalid email or password');
    }
}
}
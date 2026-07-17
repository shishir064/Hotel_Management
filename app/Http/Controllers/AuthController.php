<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    public function create()
    {
        return view('auth.register');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->hasRole('super-admin')) {
                return redirect()->route('superadmin.dashboard')->with('success', 'Login successfully');
            }
            elseif ($user->hasRole('admin')) {
                return redirect()->route('dashboard')->with('success', 'Login successfully');
            }
            else{
                return redirect()->route('show.hotel')->with('success', 'Login successfully'); 
            }
        }


        return back()->withErrors(['email' => 'Email or Password is incorrect']);
    }

    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        $user->assignRole('user');
        return redirect()->route('login.form');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')->with('success', 'Logout successfully');
    }
}

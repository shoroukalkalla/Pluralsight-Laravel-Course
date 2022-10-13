<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        if($request->isMethod('get')){
            return view('auth.register');
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()
            ->route('login')
            ->with('success', 'User created successfully!!');
    }

    /*******************************************************************************************************/

    public function login(Request $request)
    {
        if($request->isMethod('get')) {
            return view('auth.login');
        }

        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)){
            return redirect()
                ->route('home')
                ->with('success', 'Logged in successfully!!');
        }

        return redirect()
            ->route('login')
            ->withErrors('Invalid credentials!!');
    }

    /*******************************************************************************************************/

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()
            ->route('home');

        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
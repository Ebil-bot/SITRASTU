<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login');
    }

    public function login(Request $request)
{
    $request->validate([
        'email' => 'required',
        'password' => 'required'
    ], [
        'email.required' => 'Harap Isi Email',
        'password.required' => 'Harap Isi Password'
    ]);

    $infologin = [
        'email' => $request->email,
        'password' => $request->password,
    ];
    if (Auth::attempt($infologin)) {
        $user = Auth::user();
        
        // Redirect based on role
        if ($user->role === 'admin') {
            return redirect()->route('profil.index'); // Sesuai dengan route admin yang ada di web.php
        } else if ($user->role === 'alumni') {
            return redirect()->route('alumni.profil');
        }
    } else {
            return redirect()->route('login')->withErrors('Email dan Password yang dimasukkan salah')->withInput();
        }
}

    public function logout()
    {
        Auth::logout();
        return redirect('');
    }

    public function LogoutRegister()
    {
        Auth::logout();
        // Redirect to register page after logout
        return redirect('/register')->with('success', 'Kamu telah logout!');
    }
}


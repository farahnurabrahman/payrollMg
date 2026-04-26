<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller
{
    // Fungsi ini yang Laravel cari (untuk tunjuk page login)
    public function login()
    {
        
        return view('login'); 
    }

    // Fungsi untuk proses data login (POST)
    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('home'));
        }

        return redirect(route('login'))->with("error", "Email atau password salah.");
    }

    // Fungsi untuk logout
    public function logout(Request $request)
{
    \Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
}
}
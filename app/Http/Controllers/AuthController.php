<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLogin()
    {
        return view('login'); // Pastikan file blade-nya ada di resources/views/login.blade.php
    }

    // Proses login
    public function login(Request $request)
    {
        // 1. Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 2. Coba proses autentikasi
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Login berhasil, sekarang cek apakah user adalah admin
            $user = Auth::user();

            if ((int)$user->is_admin === 1) {
                // Jika admin, arahkan ke dashboard admin
                return redirect()->intended('/admin');
            } else {
                // Jika bukan admin, logout paksa agar tidak bisa masuk
                Auth::logout();
                return redirect('/login')->with('error', 'Anda tidak memiliki hak akses admin!');
            }
        }

        // 3. Jika gagal login
        return back()->withErrors([
            'email' => 'Email atau password salah!',
        ]);
    }
}
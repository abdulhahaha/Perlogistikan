<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;



class LoginController extends Controller
{
        public function index()
        {
            // Tampilkan halaman login
            return view('auth.login');
        }
    
        public function login(Request $request)
        {
            // Validasi input dengan aturan yang lebih kuat
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ], [
                'email.required' => 'Email wajib diisi',
                'email.email' => 'Format email tidak valid',
                'password.required' => 'Password wajib diisi'
            ]);
    
            // Cek kredensial login
            $infologin = $request->only('email', 'password');
    
            if (Auth::attempt($infologin)) {
                // Set session success dan redirect ke home
                session()->flash('success', 'Login berhasil! Selamat datang.');
                return redirect()->intended('/home');
            } else {
                // Kembalikan ke halaman login dengan pesan kesalahan
                return redirect()->route('login')
                    ->withErrors(['error' => 'Username atau password tidak sesuai'])
                    ->withInput(); // Mengembalikan input sebelumnya kecuali password
            }
        }
    
        public function logout()
        {
            // Logout pengguna
            Auth::logout();
            
            // Redirect ke halaman login dengan pesan sukses
            return redirect()->route('login')->with('success', 'Anda telah berhasil logout.');
        }
    }
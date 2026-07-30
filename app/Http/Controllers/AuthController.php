<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Tampilkan halaman login.
     */
    public function login()
    {
        if (Auth::check()) {

            return match (Auth::user()->role) {

                'superadmin' => redirect()->route('admin.dashboard'),

                'organizer' => redirect()->route('organizer.dashboard'),

                default => redirect()->route('home'),

            };

        }

        return view('auth.login');
    }

    /**
     * Proses Login Manual
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($credentials, $request->filled('remember'))) {

            return back()
                ->withInput()
                ->withErrors([
                    'email' => 'Email atau password salah.',
                ]);
        }

        $request->session()->regenerate();

        return match (Auth::user()->role) {

            'superadmin' => redirect()->route('admin.dashboard'),

            'organizer' => redirect()->route('organizer.dashboard'),

            default => redirect()->route('home'),

        };
    }

    /**
     * Halaman Register
     */
    public function register()
    {
        if (Auth::check()) {

            return match (Auth::user()->role) {

                'superadmin' => redirect()->route('admin.dashboard'),

                'organizer' => redirect()->route('organizer.dashboard'),

                default => redirect()->route('home'),
            };

        }

        return view('auth.register');
    }

    /**
     * Simpan User Baru
     */
    public function store(Request $request)
    {
        $data = $request->validate([

            'name' => 'required|string|max:255',

            'email' => 'required|email|unique:users,email',

            'password' => 'required|min:8|confirmed',

        ]);

        $user = \App\Models\User::create([

            'name' => $data['name'],

            'email' => $data['email'],

            'password' => bcrypt($data['password']),

            'role' => 'user',

        ]);

        Auth::login($user);

        return redirect()->route('home');
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'Berhasil logout.');
    }
}
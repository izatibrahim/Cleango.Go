<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    /**
     * Tampilkan halaman login
     */
    public function showLogin()
    {
        return view('auth.admin_login');
    }

    /**
     * Handle login request
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($credentials)) {
            return back()->withErrors([
                'email' => 'Email atau password salah.',
            ])->onlyInput('email');
        }

        $request->session()->regenerate();
        $user = Auth::user();

        // Redirect berdasarkan role
        switch ($user->role) {
            case 'admin':
                return redirect()->route('dashboard');

            case 'user':
            default:
                $pakets = Paket::all(); 
                return view('landing',compact('pakets'));
        };
    }

    /**
     * Tampilkan halaman register
     */
    public function showRegister()
    {
        return view('layouts.register');
    }

    /**
     * Handle register request
     */
    public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'user', //default role as 'user'
    ]);

    Auth::login($user);

    return redirect()->route('login');
}


    /**
     * Handle logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function index()
{
    $orders = Order::with('user','items.paket')->latest()->get();
    return view('admin.orders', compact('orders'));
}

}

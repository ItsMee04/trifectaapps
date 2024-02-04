<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->status != 1) {
                //mengarahkan ke halaman login
                return redirect('login')->with('status', 'User Account Belum Aktif');
            }

            if (Auth::user()->status == 1) {
                if (Auth::user()->role == 1) {
                    //mengarahkan ke halaman dashboard
                    return redirect('dashboard-admin');
                } elseif (Auth::user()->role == 2) {
                    //mengarahkan ke halaman dashboard
                    return redirect('dashboard-user');
                }
            }
        }
        return redirect('login')->with('status', 'Username Atau Password Salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        //mengarahkan ke halaman login
        return redirect('login');
    }
}

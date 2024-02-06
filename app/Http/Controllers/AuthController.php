<?php

namespace App\Http\Controllers;

use App\Models\RoleModel;
use Illuminate\Http\Request;
use App\Models\EmployeeModel;
use App\Models\ProfessionModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
                if (Auth::user()->role == 1 || Auth::user()->role == 2) {
                    $employeename           = EmployeeModel::where('id', Auth::user()->iduser)->first()->employeename;
                    $employeeavatar         = EmployeeModel::where('id', Auth::user()->iduser)->first()->employeeavatar;

                    $employeeprofession     = EmployeeModel::where('id', Auth::user()->iduser)->first()->employeeprofession;
                    $profession             = ProfessionModel::where('id', $employeeprofession)->first()->profession;

                    $role           = RoleModel::where('id', Auth::user()->role)->first()->role;

                    Session::put('employeename', $employeename);
                    Session::put('employeeavatar', $employeeavatar);
                    Session::put('profession', $profession);
                    Session::put('role', $role);
                    //mengarahkan ke halaman dashboard
                    return redirect('dashboard-admin');
                } elseif (Auth::user()->role == 3) {
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

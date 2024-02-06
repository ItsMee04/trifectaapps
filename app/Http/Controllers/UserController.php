<?php

namespace App\Http\Controllers;

use App\Models\EmployeeModel;
use App\Models\User;
use App\Models\RoleModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\password;

class UserController extends Controller
{
    public function index()
    {
        $listusers = DB::table('users')
            ->select('users.*', 'employee.employeename')
            ->leftjoin('employee', 'users.iduser', '=', 'employee.id')
            ->where('users.role', '!=', 1)
            ->get();

        $listrole = RoleModel::where('role', '!=', 'Admin')->get();

        return view('admin.users', ['listusers' => $listusers, 'listrole' => $listrole]);
    }

    public function store(Request $request, $id)
    {
        $employeeid = EmployeeModel::where('id', $id)->first()->id;

        $validasi = $request->validate([
            'username' =>  'required',
            'password' =>  'required',
            'role'     =>  'required'
        ]);

        User::create([
            'iduser'    => $employeeid,
            'username'  => $request->username,
            'password'  => Hash::make($request->password),
            'role'      => $request->role,
            'status'    => 2
        ]);

        return redirect('employee')->with('success', 'Data Success Disimpan !');
    }

    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'username' =>  'required',
            'role'     =>  'required',
            'status'   =>  'required'
        ]);

        if ($request->password) {

            User::where('id', $id)
                ->update([
                    'username'  => $request->username,
                    'password'  => Hash::make($request->password),
                    'role'      => $request->role,
                    'status'    => $request->status
                ]);

            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('login');
        } else {
            User::where('id', $id)
                ->update([
                    'username'  => $request->username,
                    'role'      => $request->role,
                    'status'    => $request->status
                ]);
        }

        return redirect('users')->with('success', 'Data Success Diupdate !');
    }

    public function delete(Request $request, $id)
    {
        $ceklogin = Auth::user()->iduser;
        if ($ceklogin == $id) {
            User::where('id', $id)->delete();

            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('login');
        } else {
            User::where('id', $id)->delete();
        }

        return redirect('users')->with('success', 'Data Success Dihapus !');
    }
}

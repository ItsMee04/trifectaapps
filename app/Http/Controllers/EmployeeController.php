<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\EmployeeModel;
use App\Models\ProfessionModel;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $listemployee = EmployeeModel::all();
        $listprofession = ProfessionModel::where('status',1)->get();
        return view('admin.employee',['listemployee'=> $listemployee, 'listprofession'=>$listprofession]);
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'employeename'          =>  'required',
            'employeecontact'       =>  'required',
            'employeeprofession'    =>  'required',
            'status'                =>  'required',
            'employeeaddress'       =>  'required',
        ]);

        $newSignature = '';
        $newAvatar = '';

        if ($request->file('employeesignature') AND $request->file('employeeavatar')) {

            $extension = $request->file('employeesignature')->getClientOriginalExtension();
            $newSignature = $request->employeename . '-' . now()->timestamp . '.' . $extension;
            $request->file('employeesignature')->storeAs('employeesignature', $newSignature);
            $request['employeesignature'] = $newSignature;

            $extension = $request->file('employeeavatar')->getClientOriginalExtension();
            $newAvatar = $request->employeename . '-' . now()->timestamp . '.' . $extension;
            $request->file('employeeavatar')->storeAs('employeeavatar', $newAvatar);
            $request['employeeavatar'] = $newAvatar;

            EmployeeModel::create([
                'employeename'      => $request->employeename,
                'employeeaddress'   => $request->employeeaddress,
                'employeecontact'   => $request->employeecontact,
                'employeeprofession'=> $request->employeeprofession,
                'status'            => $request->status,
                'employesignature'  => $newSignature,
                'employeeavatar'    => $newAvatar, 
            ]);
        }elseif($request->file('employeesignature')){
            $extension = $request->file('employeesignature')->getClientOriginalExtension();
            $newSignature = $request->employeename . '-' . now()->timestamp . '.' . $extension;
            $request->file('employeesignature')->storeAs('employeesignature', $newSignature);
            $request['employeesignature'] = $newSignature;

            EmployeeModel::create([
                'employeename'      => $request->employeename,
                'employeeaddress'   => $request->employeeaddress,
                'employeecontact'   => $request->employeecontact,
                'employeeprofession'=> $request->employeeprofession,
                'status'            => $request->status,
                'employesignature'  => $newSignature,
            ]);
        }elseif($request->file('employeeavatar')){
            $extension = $request->file('employeeavatar')->getClientOriginalExtension();
            $newAvatar = $request->employeename . '-' . now()->timestamp . '.' . $extension;
            $request->file('employeeavatar')->storeAs('employeeavatar', $newAvatar);
            $request['employeeavatar'] = $newAvatar;

            EmployeeModel::create([
                'employeename'      => $request->employeename,
                'employeeaddress'   => $request->employeeaddress,
                'employeecontact'   => $request->employeecontact,
                'employeeprofession'=> $request->employeeprofession,
                'status'            => $request->status,
                'employeeavatar'    => $newAvatar, 
            ]);
        }else{
            EmployeeModel::create([
                'employeename'      => $request->employeename,
                'employeeaddress'   => $request->employeeaddress,
                'employeecontact'   => $request->employeecontact,
                'employeeprofession'=> $request->employeeprofession,
                'status'            => $request->status
            ]);
        }
        return redirect('employee')->with('success','Data Success Di Simpan !');

        dd($request);
    }
}

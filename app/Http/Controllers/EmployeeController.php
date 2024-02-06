<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeModel;
use App\Models\ProfessionModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Workbench\App\Models\User as ModelsUser;

class EmployeeController extends Controller
{
    public function index()
    {
        $listemployee = DB::table('employee')
            ->select('employee.*', 'profession.profession')
            ->leftjoin('profession', 'employeeprofession', '=', 'profession.id')
            ->get();

        $listprofession = ProfessionModel::where('status', 1)->get();
        return view('admin.employee', ['listemployee' => $listemployee, 'listprofession' => $listprofession]);
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

        if ($request->file('employeesignature') && $request->file('employeeavatar')) {

            $extension = $request->file('employeesignature')->getClientOriginalExtension();
            $newSignature = $request->employeename . 'signature' . '-' . now()->timestamp . '.' . $extension;
            $request->file('employeesignature')->storeAs('employeesignature', $newSignature);
            $request['employeesignature'] = $newSignature;

            $extension = $request->file('employeeavatar')->getClientOriginalExtension();
            $newAvatar = $request->employeename . 'avatar' . '-' . now()->timestamp . '.' . $extension;
            $request->file('employeeavatar')->storeAs('employeeavatar', $newAvatar);
            $request['employeeavatar'] = $newAvatar;

            EmployeeModel::create([
                'employeename'      => $request->employeename,
                'employeeaddress'   => $request->employeeaddress,
                'employeecontact'   => $request->employeecontact,
                'employeeprofession' => $request->employeeprofession,
                'status'            => $request->status,
                'employeesignature'  => $newSignature,
                'employeeavatar'    => $newAvatar,
            ]);
        } elseif ($request->file('employeesignature')) {
            $extension = $request->file('employeesignature')->getClientOriginalExtension();
            $newSignature = $request->employeename . 'signature' . '-' . now()->timestamp . '.' . $extension;
            $request->file('employeesignature')->storeAs('employeesignature', $newSignature);
            $request['employeesignature'] = $newSignature;

            EmployeeModel::create([
                'employeename'      => $request->employeename,
                'employeeaddress'   => $request->employeeaddress,
                'employeecontact'   => $request->employeecontact,
                'employeeprofession' => $request->employeeprofession,
                'status'            => $request->status,
                'employeesignature'  => $newSignature,
            ]);
        } elseif ($request->file('employeeavatar')) {
            $extension = $request->file('employeeavatar')->getClientOriginalExtension();
            $newAvatar = $request->employeename . 'avatar' . '-' . now()->timestamp . '.' . $extension;
            $request->file('employeeavatar')->storeAs('employeeavatar', $newAvatar);
            $request['employeeavatar'] = $newAvatar;

            EmployeeModel::create([
                'employeename'      => $request->employeename,
                'employeeaddress'   => $request->employeeaddress,
                'employeecontact'   => $request->employeecontact,
                'employeeprofession' => $request->employeeprofession,
                'status'            => $request->status,
                'employeeavatar'    => $newAvatar,
            ]);
        } else {
            EmployeeModel::create([
                'employeename'      => $request->employeename,
                'employeeaddress'   => $request->employeeaddress,
                'employeecontact'   => $request->employeecontact,
                'employeeprofession' => $request->employeeprofession,
                'status'            => $request->status
            ]);
        }
        return redirect('employee')->with('success', 'Data Success Di Simpan !');
    }

    public function show($id)
    {
        $listemployee = EmployeeModel::where('id',$id)->first();
        $listprofession = ProfessionModel::all();

        return view('admin.editpage.edit-employee',['listemployee'=>$listemployee,'listprofession'=>$listprofession]);
    }

    public function update(Request $request, $id)
    {
        $listemployee = EmployeeModel::where('id', $id)->first();
        $validate = $request->validate([
            'employeename'          =>  'required',
            'employeecontact'       =>  'required',
            'employeeprofession'    =>  'required',
            'status'                =>  'required',
            'employeeaddress'       =>  'required',
        ]);

        if ($request->file('employeesignature') && $request->file('employeeavatar')) {

            $pathsignature  = 'storage/employeesignature/' . $listemployee->employeesignature;
            $pathavatar     = 'storage/employeeavatar/' . $listemployee->employeeavatar;

            if (File::exists($pathsignature, $pathavatar)) {
                File::delete($pathsignature, $pathavatar);
            }

            $extension = $request->file('employeesignature')->getClientOriginalExtension();
            $newSignature = $request->employeename . 'signature' . '-' . now()->timestamp . '.' . $extension;
            $request->file('employeesignature')->storeAs('employeesignature', $newSignature);
            $request['employeesignature'] = $newSignature;

            $extension = $request->file('employeeavatar')->getClientOriginalExtension();
            $newAvatar = $request->employeename . 'avatar' . '-' . now()->timestamp . '.' . $extension;
            $request->file('employeeavatar')->storeAs('employeeavatar', $newAvatar);
            $request['employeeavatar'] = $newAvatar;

            EmployeeModel::where('id', $id)
                ->update([
                    'employeename'      => $request->employeename,
                    'employeeaddress'   => $request->employeeaddress,
                    'employeecontact'   => $request->employeecontact,
                    'employeeprofession' => $request->employeeprofession,
                    'status'            => $request->status,
                    'employeesignature'  => $newSignature,
                    'employeeavatar'    => $newAvatar,
                ]);
        }elseif($request->file('employeesignature')){
            $pathsignature  = 'storage/employeesignature/' . $listemployee->employeesignature;

            if (File::exists($pathsignature)) {
                File::delete($pathsignature);
            }

            $extension = $request->file('employeesignature')->getClientOriginalExtension();
            $newSignature = $request->employeename . 'signature' . '-' . now()->timestamp . '.' . $extension;
            $request->file('employeesignature')->storeAs('employeesignature', $newSignature);
            $request['employeesignature'] = $newSignature;

            EmployeeModel::where('id', $id)
                ->update([
                    'employeename'      => $request->employeename,
                    'employeeaddress'   => $request->employeeaddress,
                    'employeecontact'   => $request->employeecontact,
                    'employeeprofession' => $request->employeeprofession,
                    'status'            => $request->status,
                    'employeesignature'  => $newSignature,
                ]);
        }elseif($request->file('employeeavatar'))
        {
            $pathavatar     = 'storage/employeeavatar/' . $listemployee->employeeavatar;

            if (File::exists($pathavatar)) {
                File::delete($pathavatar);
            }

            $extension = $request->file('employeeavatar')->getClientOriginalExtension();
            $newAvatar = $request->employeename . 'avatar' . '-' . now()->timestamp . '.' . $extension;
            $request->file('employeeavatar')->storeAs('employeeavatar', $newAvatar);
            $request['employeeavatar'] = $newAvatar;

            EmployeeModel::where('id', $id)
                ->update([
                    'employeename'      => $request->employeename,
                    'employeeaddress'   => $request->employeeaddress,
                    'employeecontact'   => $request->employeecontact,
                    'employeeprofession' => $request->employeeprofession,
                    'status'            => $request->status,
                    'employeeavatar'    => $newAvatar,
                ]);
        }else{
            EmployeeModel::where('id', $id)
                ->update([
                    'employeename'      => $request->employeename,
                    'employeeaddress'   => $request->employeeaddress,
                    'employeecontact'   => $request->employeecontact,
                    'employeeprofession' => $request->employeeprofession,
                    'status'            => $request->status
                ]);
        }
        return redirect('employee')->with('success', 'Data Success Di Update !');
    }

    public function delete($id)
    {
        $listemployee = EmployeeModel::where('id', $id)->first();
        $listusers    = User::where('iduser', $id)->first()->id;

        $deleteemployee = EmployeeModel::where('id',$id)->delete();

        if($listusers != null)
        {
            if ($deleteemployee) {
                User::where('iduser',$id)->delete();
            }
        }
    
        return redirect('employee')->with('success', 'Data Success Diahpus !');
    }
}

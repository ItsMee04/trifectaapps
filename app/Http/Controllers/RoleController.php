<?php

namespace App\Http\Controllers;

use App\Models\RoleModel;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $listrole = RoleModel::where('role', '!=', 'Admin')->get();
        return view('admin.role', ['listrole' => $listrole]);
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'role'    =>  'required',
            'status'        =>  'required',
        ]);

        RoleModel::create([
            'role'    => $request->role,
            'status'        => $request->status
        ]);

        return redirect('role')->with('success', 'Data Success Disimpan !');
    }

    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'role'    =>  'required',
            'status'        =>  'required',
        ]);

        RoleModel::where('id', $id)
            ->update([
                'role'    => $request->role,
                'status'        => $request->status
            ]);

        return redirect('role')->with('success', 'Data Success Diupdate !');
    }

    public function delete($id)
    {
        RoleModel::where('id', $id)->delete();

        return redirect('role')->with('success', 'Data Success Dihapus !');
    }
}

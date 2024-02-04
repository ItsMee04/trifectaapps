<?php

namespace App\Http\Controllers;

use App\Models\TypeproductModel;
use Illuminate\Http\Request;

class TypeproductController extends Controller
{
    public function index()
    {
        $listtypeproduct = TypeproductModel::all();
        return view('admin.typeproduct', ['listtypeproduct' => $listtypeproduct]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'type'  => 'required',
            'status' => 'required'
        ]);

        TypeproductModel::create([
            'type'  => $request->type,
            'status' => $request->status
        ]);

        return redirect('typeproduct')->with('success', 'Data Success Disimpan !');
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'type'  => 'required',
            'status' => 'required'
        ]);

        TypeproductModel::where('id', $id)
            ->update([
                'type'  => $request->type,
                'status' => $request->status
            ]);

        return redirect('typeproduct')->with('success', 'Data Success Diupdate !');
    }

    public function delete($id)
    {
        TypeproductModel::where('id', $id)
            ->delete();

        return redirect('typeproduct')->with('success', 'Data Success Dihapus !');
    }
}

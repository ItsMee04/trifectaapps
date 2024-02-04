<?php

namespace App\Http\Controllers;

use App\Models\CategoriesModel;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $listcategories = CategoriesModel::all();
        return view('admin.categories', ['listcategories' => $listcategories]);
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'categories'    => 'required',
            'description'   => 'required',
            'status'        => 'required'
        ]);

        CategoriesModel::create([
            'categories'    => $request->categories,
            'description'   => $request->description,
            'status'        => $request->status
        ]);

        return redirect('categories')->with('success', 'Data Succes Disimpan !');
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'categories'    => 'required',
            'description'   => 'required',
            'status'        => 'required'
        ]);

        CategoriesModel::where('id', $id)
            ->update([
                'categories'    => $request->categories,
                'description'   => $request->description,
                'status'        => $request->status
            ]);

        return redirect('categories')->with('success', 'Data Success Diupdate');
    }

    public function delete($id)
    {
        CategoriesModel::where('id', $id)
            ->delete();

        return redirect('categories')->with('success', 'Data Berhasil Dihapus');
    }
}

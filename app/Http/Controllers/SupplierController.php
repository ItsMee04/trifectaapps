<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SupplierModel;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class SupplierController extends Controller
{
    public function index()
    {
        $listsupplier = SupplierModel::all();
        return view('admin.supplier',['listsupplier'=>$listsupplier]);
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'suppliername'      => 'required',
            'suppliercontact'   => 'required',
            'supplieraddress'   => 'required',
            'status'            => 'required'
        ]);

        SupplierModel::create([
            'suppliername'      => $request->suppliername,
            'suppliercontact'   => $request->suppliercontact,
            'supplieraddress'   => $request->supplieraddress,
            'status'            => $request->status,
        ]);

        return redirect('supplier')->with('success','Data Success Di Simpan !');
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'suppliername'      => 'required',
            'suppliercontact'   => 'required',
            'supplieraddress'   => 'required',
            'status'            => 'required'
        ]);

        SupplierModel::where('id',$id)->update([
            'suppliername'      => $request->suppliername,
            'suppliercontact'   => $request->suppliercontact,
            'supplieraddress'   => $request->supplieraddress,
            'status'            => $request->status,
        ]);

        return redirect('supplier')->with('success','Data Success Di Update !');
    }

    public function delete($id)
    {
        SupplierModel::where('id',$id)->delete();

        return redirect('supplier')->with('success','Data Success Di Hapus !');
    }
}

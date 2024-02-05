<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CustomerModel;
use Illuminate\Http\Request;
use Psy\CodeCleaner\ReturnTypePass;

class CustomerController extends Controller
{
    public function index()
    {
        $listcustomer = CustomerModel::all();
        return view('admin.customer',['listcustomer'=>$listcustomer]);
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'customername'          => 'required',
            'customercontact'       => 'required',
            'customeridentity'      => 'required|max:16',
            'customerdateofbirth'   => 'required',
            'customeraddress'       => 'required',
            'status'                => 'required'
        ]);

        CustomerModel::create([
            'customername'          => $request->customername,
            'customercontact'       => $request->customercontact,
            'customeridentity'      => $request->customeridentity,
            'customerdateofbirth'   => $request->customerdateofbirth,
            'customeraddress'       => $request->customeraddress,
            'status'                => $request->status
        ]);

        return redirect('customer')->with('success','Data Success Di Simpan !');
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'customername'          => 'required',
            'customercontact'       => 'required',
            'customeridentity'      => 'required|max:16',
            'customerdateofbirth'   => 'required',
            'customeraddress'       => 'required',
            'customerpoint'         => 'required',
            'status'                => 'required'
        ]);

        CustomerModel::where('id',$id)->update([
            'customername'          => $request->customername,
            'customercontact'       => $request->customercontact,
            'customeridentity'      => $request->customeridentity,
            'customerdateofbirth'   => $request->customerdateofbirth,
            'customeraddress'       => $request->customeraddress,
            'customerpoint'         => $request->customerpoint,
            'status'                => $request->status
        ]);

        return redirect('customer')->with('success', 'Data Success Di Update !');
    }

    public function delete($id)
    {
        CustomerModel::where('id',$id)->delete();

        return redirect('customer')->with('success','Data Succes Di Hapus !');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class BarcodeController extends Controller
{
    public function index()
    {
        return view('admin.barcode.scanbarcode');
    }

    public function scanbarcodevalidasi(Request $request)
    {
        $id = $request->qr_code;
        $qrcodeid = ProductModel::where('codeproduct', $id)->first()->codeproduct;

        if ($id == $qrcodeid) {
            return response()->json([
                'status' => 200
            ]);

            return redirect('product-details/' . $qrcodeid)->with('success', 'Data Success Di Scan !');
        } else {
            return response()->json(
                [
                    'status' => 400
                ]
            );
            return redirect('product-details/' . $qrcodeid)->with('success', 'Data Failed Di Scan !');
        }
    }

    public function show($id)
    {
        $qrcodeid = ProductModel::where('codeproduct', $id)->first()->codeproduct;
        return view('admin.view-barcode', ['qrcodeid' => $qrcodeid]);
    }

    public function printbarcode($id)
    {
        $qrcodeid = ProductModel::where('codeproduct', $id)->first()->codeproduct;
        return view('admin.barcode.view-barcode', ['qrcodeid' => $qrcodeid]);
    }
}

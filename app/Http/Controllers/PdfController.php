<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class PdfController extends Controller
{
    public function printbarcode($id)
    {
        $data = ProductModel::where('codeproduct', $id)->first()->codeproduct;

        $pdf = Pdf::loadView('admin.barcode.view-barcode', ['qrcodeid' => $data]);
        return $pdf->download('barcode.pdf');
    }
}

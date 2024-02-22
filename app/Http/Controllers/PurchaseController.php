<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;
use App\Models\PurchaseModel;
use App\Models\CategoriesModel;
use App\Models\TypeproductModel;
use App\Http\Controllers\Controller;

class PurchaseController extends Controller
{
    public function index()
    {
        $listpurchase = PurchaseModel::all();

        //codepurchase
        $id = "PU-";
        $tahun = date('Y');

        $idTransaction = PurchaseModel::latest()->first();

        if ($idTransaction == null) {
            $nourut = "000001";
            $idpurchase = $id . $tahun . $nourut;
        } else {
            $nourut = substr($idTransaction->idpurchase, 6, 6) + 1;
            $nourut = str_pad($nourut, 6, "0", STR_PAD_LEFT);

            $idpurchase = $id . $tahun . $nourut;
        }

        $purchasedate = date('Y-m-d');

        $listcategories = CategoriesModel::all();

        $typeproduct = TypeproductModel::all();

        return view('admin.purchase', [
            'listpurchase' => $listpurchase,
            'idpurchase' => $idpurchase,
            'purchasedate' => $purchasedate,
            'listcategories' => $listcategories,
            'typeproduct'   => $typeproduct
        ]);
    }

    public function store(Request $request)
    {
        //codeproduct
        $numberproduct = ProductModel::latest()->first();
        $code = "P-";
        $year = date('Y');

        if ($numberproduct == null) {
            $serialnumber = "000001";
            $codeproduct = $code . $year . $serialnumber;
        } else {
            $serialnumber = substr($numberproduct->codeproduct, 6, 6) + 1;
            $serialnumber = str_pad($serialnumber, 6, "0", STR_PAD_LEFT);

            $codeproduct = $code . $year . $serialnumber;
        }

        $validasi = $request->validate([
            'idpurchase'    =>  'required',
            'productname'   =>  'required',
            'weightproduct' =>  'required',
            'caratproduct'  =>  'required',
            'purchaseprice' =>  'required',
            'purchasedate'  =>  'required',
            'conditionproduct'  =>  'required',
            'typeproduct'   =>  'required',
            'categoriesproduct' =>  'required',
            'decriptionproduct' =>  'required'
        ]);

        $newphoto = "";
        if ($request->file('photoproduct')) {
            $extension = $request->file('photoproduct')->getClientOriginalExtension();
            $newphoto = $codeproduct . '-' . now()->timestamp . '.' . $extension;
            $request->file('photoproduct')->storeAs('photoproduct', $newphoto);
            $request['photoproduct'] = $newphoto;
        }

        $insertpurchase = PurchaseModel::create([
            'idpurchase'    =>  $request->idpurchase,
            'productname'   =>  $request->productname,
            'weightproduct' =>  $request->weightproduct,
            'caratproduct'  =>  $request->caratproduct,
            'purchaseprice' =>  $request->purchaseprice,
            'purchasedate'  =>  $request->purchasedate,
            'conditionproduct'  =>  $request->conditionproduct,
            'typeproduct'   =>  $request->typeproduct,
            'categoriesproduct' =>  $request->categoriesproduct,
            'decriptionproduct' =>  $request->decriptionproduct,
            'status'        =>  2,
            'photoproduct'  => $newphoto,
        ]);

        if ($insertpurchase) {
            ProductModel::create([
                'codeproduct'           => $codeproduct,
                'nameproduct'           => $request->productname,
                'descriptionproduct'    => $request->decriptionproduct,
                'typeproduct'           => $request->typeproduct,
                'weightproduct'         => $request->weightproduct,
                'caratproduct'          => $request->caratproduct,
                'categoriesproduct'     => $request->categoriesproduct,
                'status'                => 2,
                'photoproduct'          => $newphoto
            ]);
        }

        return redirect('purchase')->with('success', 'Data Success Disimpan !');
    }
}

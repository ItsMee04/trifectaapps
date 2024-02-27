<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;
use App\Models\PurchaseModel;
use App\Models\CategoriesModel;
use App\Models\TypeproductModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class PurchaseController extends Controller
{
    public function index()
    {
        $listpurchase = PurchaseModel::all();

        //codepurchase
        $id = "PU-";
        $tahun = date('Y');

        $numberpurchase = PurchaseModel::latest()->first();

        if ($numberpurchase == null) {
            $nourut = "000001";
            $idpurchase = $id . $tahun . $nourut;
        } else {
            $nourut = substr($numberpurchase->idpurchase, 7, 7) + 1;
            $nourut = str_pad($nourut, 6, "0", STR_PAD_LEFT);

            $idpurchase = $id . $tahun . $nourut;
        }

        $purchasedate = date('Y-m-d');

        $listcategories = CategoriesModel::all();

        $typeproduct = TypeproductModel::all();

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

        return view('admin.purchase', [
            'listpurchase' => $listpurchase,
            'idpurchase' => $idpurchase,
            'purchasedate' => $purchasedate,
            'listcategories' => $listcategories,
            'typeproduct'   => $typeproduct,
            'codeproduct'   => $codeproduct
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
            'categoriesproduct' =>  'required'
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
            'codeproduct'   =>  $codeproduct,
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

    public function show($id)
    {
        $listpurchase = PurchaseModel::where('id', $id)->first();
        $typeproduct = TypeproductModel::all();
        $listcategories = CategoriesModel::all();
        return view('admin.editpage.edit-purchase', [
            'listpurchase' => $listpurchase,
            'typeproduct'  => $typeproduct,
            'listcategories'    =>  $listcategories,
        ]);
    }

    public function update(Request $request, $id)
    {
        $listpurchase = PurchaseModel::where('id', $id)->first();

        $validasi = $request->validate([
            'productname'   =>  'required',
            'weightproduct' =>  'required',
            'caratproduct'  =>  'required',
            'purchaseprice' =>  'required',
            'purchasedate'  =>  'required',
            'conditionproduct'  =>  'required',
            'typeproduct'   =>  'required',
            'categoriesproduct' =>  'required'
        ]);

        if ($request->file('photoproduct')) {

            $path = 'storage/photoproduct/' . $listpurchase->photoproduct;

            if (File::exists($path)) {
                File::delete($path);
            }

            $extension = $request->file('photoproduct')->getClientOriginalExtension();
            $newphoto = $request->codeproduct . '-' . now()->timestamp . '.' . $extension;
            $request->file('photoproduct')->storeAs('photoproduct', $newphoto);
            $request['photoproduct'] = $newphoto;

            $updatepurchase = PurchaseModel::where('id', $id)
                ->update([
                    'productname'   =>  $request->productname,
                    'weightproduct' =>  $request->weightproduct,
                    'caratproduct'  =>  $request->caratproduct,
                    'purchaseprice' =>  $request->purchaseprice,
                    'purchasedate'  =>  $request->purchasedate,
                    'conditionproduct'  =>  $request->conditionproduct,
                    'typeproduct'   =>  $request->typeproduct,
                    'categoriesproduct' =>  $request->categoriesproduct,
                    'photoproduct'  => $newphoto
                ]);

            if ($updatepurchase) {
                ProductModel::where('codeproduct', $request->codeproduct)
                    ->update([
                        'nameproduct'   =>  $request->productname,
                        'weightproduct' =>  $request->weightproduct,
                        'caratproduct'  =>  $request->caratproduct,
                        'purchaseprice' =>  $request->purchaseprice,
                        'typeproduct'   =>  $request->typeproduct,
                        'photoproduct'  => $newphoto
                    ]);
            }
        } else {
            $updatepurchase = PurchaseModel::where('id', $id)
                ->update([
                    'productname'   =>  $request->productname,
                    'weightproduct' =>  $request->weightproduct,
                    'caratproduct'  =>  $request->caratproduct,
                    'purchaseprice' =>  $request->purchaseprice,
                    'purchasedate'  =>  $request->purchasedate,
                    'conditionproduct'  =>  $request->conditionproduct,
                    'typeproduct'   =>  $request->typeproduct,
                    'categoriesproduct' =>  $request->categoriesproduct
                ]);

            if ($updatepurchase) {
                ProductModel::where('codeproduct', $request->codeproduct)
                    ->update([
                        'nameproduct'   =>  $request->productname,
                        'weightproduct' =>  $request->weightproduct,
                        'caratproduct'  =>  $request->caratproduct,
                        'purchaseprice' =>  $request->purchaseprice,
                        'typeproduct'   =>  $request->typeproduct
                    ]);
            }
        }

        return redirect('purchase')->with('success', 'Data Success Di Update !');
    }

    public function delete($id)
    {
        $listpurchase = PurchaseModel::where('id', $id)->first();
        $idproduct    = $listpurchase->codeproduct;

        $path = 'storage/photoproduct/' . $listpurchase->photoproduct;

        if (File::exists($path)) {
            File::delete($path);
        }

        $deletePurchase =  PurchaseModel::where('id', $id)->delete();

        if ($deletePurchase) {
            ProductModel::where('codeproduct', $idproduct)->delete();
        }

        return redirect('purchase')->with('success', 'Data Success Di Hapus !');
    }

    public function updateStatus($id)
    {
        $codeproduct = PurchaseModel::where('id', $id)->first()->codeproduct;
        $updateStatus = PurchaseModel::where('id', $id)->update([
            'status' => 1,
        ]);

        if ($updateStatus) {
            ProductModel::where('codeproduct', $codeproduct)->update([
                'status'    => 1,
            ]);
        }

        return redirect('purchase')->with('success', 'Data Success Di Update !');
    }
}

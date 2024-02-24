<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;
use App\Models\TypeproductModel;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $listproduct = ProductModel::where('status', 1)->get();
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

        return view('admin.product', ['listproduct' => $listproduct, 'typeproduct' => $typeproduct, 'codeproduct' => $codeproduct]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'codeproduct'           => 'required',
            'nameproduct'           => 'required',
            'descriptionproduct'    => 'required',
            'sellingprice'          => 'required',
            'typeproduct'           => 'required',
            'weightproduct'         => 'required',
            'caratproduct'          => 'required',
            'status'                => 'required',
        ]);

        $newphoto = "";
        if ($request->file('photoproduct')) {
            $extension = $request->file('photoproduct')->getClientOriginalExtension();
            $newphoto = $request->codeproduct . '-' . now()->timestamp . '.' . $extension;
            $request->file('photoproduct')->storeAs('photoproduct', $newphoto);
            $request['photoproduct'] = $newphoto;
        }

        ProductModel::create([
            'codeproduct'           => $request->codeproduct,
            'nameproduct'           => $request->nameproduct,
            'descriptionproduct'    => $request->descriptionproduct,
            'sellingprice'          => $request->sellingprice,
            'typeproduct'           => $request->typeproduct,
            'weightproduct'         => $request->weightproduct,
            'caratproduct'          => $request->caratproduct,
            'status'                => $request->status,
            'photoproduct'          => $newphoto
        ]);

        return redirect('product')->with('success', 'Data Success Disimpan !');
    }

    public function productdetail($id)
    {
        $listproduct = ProductModel::where('codeproduct', $id)->first();
        return view('admin.detailpage.product-details', ['listproduct' => $listproduct]);
    }

    public function show($id)
    {
        $listproduct = ProductModel::where('id', $id)->first();
        $typeproduct = TypeproductModel::all();

        return view('admin.editpage.edit-product', ['listproduct' => $listproduct, 'typeproduct' => $typeproduct]);
    }

    public function update(Request $request, $id)
    {
        $listproduct = ProductModel::where('id', $id)->first();
        $validate = $request->validate([
            'codeproduct'           => 'required',
            'nameproduct'           => 'required',
            'descriptionproduct'    => 'required',
            'sellingprice'          => 'required',
            'typeproduct'           => 'required',
            'weightproduct'         => 'required',
            'caratproduct'          => 'required',
            'status'                => 'required',
        ]);

        if ($request->file('photoproduct')) {

            $path = 'storage/photoproduct/' . $listproduct->photoproduct;

            if (File::exists($path)) {
                File::delete($path);
            }

            $extension = $request->file('photoproduct')->getClientOriginalExtension();
            $newphoto = $request->codeproduct . '-' . now()->timestamp . '.' . $extension;
            $request->file('photoproduct')->storeAs('photoproduct', $newphoto);
            $request['photoproduct'] = $newphoto;

            ProductModel::where('id', $id)
                ->update([
                    'nameproduct'           => $request->nameproduct,
                    'descriptionproduct'    => $request->descriptionproduct,
                    'sellingprice'          => $request->sellingprice,
                    'typeproduct'           => $request->typeproduct,
                    'weightproduct'         => $request->weightproduct,
                    'caratproduct'          => $request->caratproduct,
                    'status'                => $request->status,
                    'photoproduct'          => $newphoto
                ]);
        } else {
            ProductModel::where('id', $id)
                ->update([
                    'nameproduct'           => $request->nameproduct,
                    'descriptionproduct'    => $request->descriptionproduct,
                    'sellingprice'          => $request->sellingprice,
                    'typeproduct'           => $request->typeproduct,
                    'weightproduct'         => $request->weightproduct,
                    'caratproduct'          => $request->caratproduct,
                    'status'                => $request->status
                ]);
        }
        return redirect('product')->with('success', 'Data Success Di Update !');
    }

    public function delete($id)
    {
        $listproduct = ProductModel::where('id', $id)->first();

        $path = 'storage/photoproduct/' . $listproduct->photoproduct;

        if (File::exists($path)) {
            File::delete($path);
        }
        ProductModel::where('id', $id)->delete();

        return redirect('product')->with('success', 'Data Success Di Hapus !');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CartModel;
use App\Models\CustomerModel;
use App\Models\ProductModel;
use App\Models\TransactionModel;
use App\Models\TypeproductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
    }

    public function shoppingCart()
    {
        $typecincin    = TypeproductModel::where('type','CINCIN')->first()->id;
        $typeanting    = TypeproductModel::where('type','ANTING')->first()->id;
        $typegelang    = TypeproductModel::where('type','GELANG')->first()->id;
        $typekalung    = TypeproductModel::where('type','KALUNG')->first()->id;

        $listproductcincin      = ProductModel::where('typeproduct',$typecincin)->get();
        $listproductanting      = ProductModel::where('typeproduct',$typeanting)->get();
        $listproductgelang      = ProductModel::where('typeproduct',$typegelang)->get();
        $listproductkalung      = ProductModel::where('typeproduct',$typekalung)->get();

        $listcustomer   = CustomerModel::all();

        $id = "T-";
        $tahun = date('Y');

        $idTransaction = TransactionModel::latest()->first();

        if ($idTransaction == null) {
            $nourut = "000001";
            $idshoppingcart = $id . $tahun . $nourut;
        } else {
            $nourut = substr($idTransaction->idtransaction, 6, 6) + 1;
            $nourut = str_pad($nourut, 6, "0", STR_PAD_LEFT);

            $idshoppingcart = $id . $tahun . $nourut;
        }

        $countshoppingcart = CartModel::where('sales',Auth::user()->iduser)->where('status',1)->count();

        $listshoppingcartactive = CartModel::where('sales',Auth::user()->iduser)
        ->where('status',1)
        ->latest('idshoppingcart')
        ->first();

        $listshoppingcart  = CartModel::leftjoin('product','cart.product','product.id')
            ->where('cart.status',1)
            ->where('cart.sales', Auth::user()->iduser)
            ->get();
        
        $subtotal = ProductModel::leftjoin('cart','product.id','cart.id')
        ->where('cart.status',1)
        ->where('cart.sales',Auth::user()->iduser)
        ->sum('product.priceproduct');

        return view('admin.shopping-cart', [
            'listproductcincin' =>  $listproductcincin,
            'listproductanting' =>  $listproductanting,
            'listproductgelang' =>  $listproductgelang,
            'listproductkalung' =>  $listproductkalung,
            'listcustomer'      =>  $listcustomer,
            'idshoppingcart'    =>  $idshoppingcart,
            'countshoppingcart' =>  $countshoppingcart,
            'listshoppingcartactive'    =>  $listshoppingcartactive,
            'listshoppingcart'  =>  $listshoppingcart,
            'subtotal'          =>  $subtotal,
        ]);
        // dd($typecincin,$typeanting,$typegelang,$typekalung);
    }

    public function addtocart($id)
    {
        $listproduct = ProductModel::where('codeproduct', $id)->first()->id;

        $lastidcart = CartModel::
            latest('idshoppingcart')
            ->first();

        $id = "C-";
        $tahun = date('Y');

        if ($lastidcart == null) {
            $nourut = "000001";
            $idcart = $id . $tahun . $nourut;

            CartModel::create([
                'idshoppingcart'    => $idcart,
                'product'           => $listproduct,
                'status'            => 1,
                'sales'             => Auth::user()->iduser
            ]);

        } elseif ($lastidcart->status == 1) {
            $nourut = substr($lastidcart->idshoppingcart, 6, 6);
            $idcart = $id . $tahun . $nourut;

            CartModel::create([
                'idshoppingcart'    => $idcart,
                'product'           => $listproduct,
                'status'            => 1,
                'sales'             => Auth::user()->iduser
            ]);
        } elseif ($lastidcart->status == 2) {
            $nourut = substr($lastidcart->idcart, 6, 6) + 1;
            $nourut = str_pad($nourut, 6, "0", STR_PAD_LEFT);

            $idcart = $id . $tahun . $nourut;

            CartModel::create([
                'idshoppingcart'    => $idcart,
                'product'           => $listproduct,
                'status'            => 1,
                'sales'             => Auth::user()->iduser
            ]);
        }

        return redirect('shopping-cart')->with('success', 'Data Ditambahkan Ke Keranjang');
    }
}

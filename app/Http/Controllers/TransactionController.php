<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use App\Models\CustomerModel;
use App\Models\TransactionModel;
use App\Models\TypeproductModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $listorders = TransactionModel::leftjoin('customer', 'transaction.customer', 'customer.id')->get();
        return view('admin.orders', ['listorders' => $listorders]);
    }

    public function show($id)
    {
        $listorders = TransactionModel::leftjoin('cart', 'transaction.idshoppingcart', 'cart.idshoppingcart')
            ->leftjoin('customer', 'transaction.customer', 'customer.id')
            ->leftjoin('product', 'cart.product', 'product.id')
            ->where('transaction.idshoppingcart', $id)
            ->where('cart.sales', Auth::user()->iduser)
            ->get();

        $idshoppingcart = TransactionModel::leftjoin('cart', 'transaction.idshoppingcart', 'cart.idshoppingcart')
            ->leftjoin('customer', 'transaction.customer', 'customer.id')
            ->leftjoin('product', 'cart.product', 'product.id')
            ->where('transaction.idshoppingcart', $id)
            ->where('cart.sales', Auth::user()->iduser)
            ->first()->idshoppingcart;

        $orders = DB::table('transaction')
            ->leftjoin('cart', 'transaction.idshoppingcart', 'cart.idshoppingcart')
            ->leftjoin('customer', 'transaction.customer', 'customer.id')
            ->where('transaction.idshoppingcart', $id)
            ->where('cart.sales', Auth::user()->iduser)
            ->groupBy('transaction.idshoppingcart')
            ->get();

        return view('admin.detailpage.orders-details', ['listorders' => $listorders, 'idshoppingcart' => $idshoppingcart, 'orders' => $orders]);
    }

    public function shoppingCart()
    {
        $typecincin    = TypeproductModel::where('type', 'CINCIN')->first()->id;
        $typeanting    = TypeproductModel::where('type', 'ANTING')->first()->id;
        $typegelang    = TypeproductModel::where('type', 'GELANG')->first()->id;
        $typekalung    = TypeproductModel::where('type', 'KALUNG')->first()->id;

        $listproductcincin      = ProductModel::where('typeproduct', $typecincin)->get();
        $listproductanting      = ProductModel::where('typeproduct', $typeanting)->get();
        $listproductgelang      = ProductModel::where('typeproduct', $typegelang)->get();
        $listproductkalung      = ProductModel::where('typeproduct', $typekalung)->get();

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

        $countshoppingcart = CartModel::where('sales', Auth::user()->iduser)->where('status', 1)->count();

        $listshoppingcartactive = CartModel::where('sales', Auth::user()->iduser)
            ->where('status', 1)
            ->latest('idshoppingcart')
            ->first();

        $listshoppingcart  = CartModel::select('product.*', 'cart.status', 'cart.sales', 'cart.id as idcart', 'cart.idshoppingcart')
            ->leftjoin('product', 'cart.product', 'product.id')
            ->where('cart.status', 1)
            ->where('cart.sales', Auth::user()->iduser)
            ->get();

        $subtotal = ProductModel::leftjoin('cart', 'product.id', 'cart.product')
            ->where('cart.status', 1)
            ->where('cart.sales', Auth::user()->iduser)
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
        // dd($subtotal);
    }

    public function addtocart($id)
    {
        $listproduct = ProductModel::where('codeproduct', $id)->first()->id;

        $lastidcart = CartModel::latest('idshoppingcart')
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
            $nourut = substr($lastidcart->idshoppingcart, 6, 6) + 1;
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

    public function deleteshoppingcart($id)
    {
        $listcart = CartModel::where('id', $id)->delete();
        return redirect('shopping-cart')->with('success', 'Data Success Dihapus !');
    }

    public function deleteallshoppingcart($id)
    {
        $listcart = CartModel::where('idshoppingcart', $id)
            ->where('sales', Auth::user()->iduser)
            ->delete();

        return redirect('shopping-cart')->with('success', 'Data Success Dihapus !');
    }

    public function checkout(Request $request)
    {
        $validasi = $request->validate([
            'customername'  =>  'required',
        ]);

        $idshoppingcart = CartModel::where('sales', Auth::user()->iduser)
            ->where('status', 1)
            ->first()
            ->idshoppingcart;

        $idtransaction = TransactionModel::latest('idtransaction')
            ->first();

        $id = "T-";
        $tahun = date('Y');

        if ($idtransaction == null) {
            $nourut = "000001";
            $newidtransaction = $id . $tahun . $nourut;
        } else {
            $nourut = substr($idtransaction->idtransaction, 6, 6) + 1;
            $nourut = str_pad($nourut, 6, "0", STR_PAD_LEFT);

            $newidtransaction = $id . $tahun . $nourut;
        }

        $subtotal = ProductModel::leftjoin('cart', 'product.id', 'cart.product')
            ->where('cart.status', 1)
            ->where('cart.sales', Auth::user()->iduser)
            ->sum('product.priceproduct');

        $insert = TransactionModel::create([
            'idtransaction' => $newidtransaction,
            'idshoppingcart'    => $idshoppingcart,
            'customer'          => $request->customername,
            'purchasedate'      => date("Y-m-d"),
            'total'             => $subtotal,
            'sales'             => Auth::user()->iduser
        ]);

        if ($insert) {

            CartModel::where('sales', Auth::user()->iduser)
                ->where('status', 1)
                ->where('idshoppingcart', $idshoppingcart)
                ->update([
                    'status' => 2
                ]);
        }

        return redirect('shopping-cart')->with('success', 'Transaction Succesfully !');
    }
}

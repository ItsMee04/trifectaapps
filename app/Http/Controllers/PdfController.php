<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;
use App\Models\EmployeeModel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\TransactionModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class PdfController extends Controller
{
    public function printbarcode($id)
    {
        $data = ProductModel::where('codeproduct', $id)->first()->codeproduct;

        $pdf = Pdf::loadView('admin.barcode.view-barcode', ['qrcodeid' => $data]);
        return $pdf->download('barcode.pdf');
    }

    public function printinvoice($id)
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
            ->get();

        $customer = DB::table('transaction')
            ->leftjoin('cart', 'transaction.idshoppingcart', 'cart.idshoppingcart')
            ->leftjoin('customer', 'transaction.customer', 'customer.id')
            ->where('transaction.idshoppingcart', $id)
            ->where('cart.sales', Auth::user()->iduser)
            ->first()->customername;

        $phone = DB::table('transaction')
            ->leftjoin('cart', 'transaction.idshoppingcart', 'cart.idshoppingcart')
            ->leftjoin('customer', 'transaction.customer', 'customer.id')
            ->where('transaction.idshoppingcart', $id)
            ->where('cart.sales', Auth::user()->iduser)
            ->first()->customercontact;

        $address = DB::table('transaction')
            ->leftjoin('cart', 'transaction.idshoppingcart', 'cart.idshoppingcart')
            ->leftjoin('customer', 'transaction.customer', 'customer.id')
            ->where('transaction.idshoppingcart', $id)
            ->where('cart.sales', Auth::user()->iduser)
            ->first()->customeraddress;

        $reference = TransactionModel::where('idshoppingcart', $id)
            ->where('sales', Auth::user()->iduser)
            ->first()->idtransaction;

        $status = TransactionModel::where('idshoppingcart', $id)
            ->where('sales', Auth::user()->iduser)
            ->first()->status;

        $total = TransactionModel::where('idshoppingcart', $id)
            ->where('sales', Auth::user()->iduser)
            ->first()->total;

        $sales = EmployeeModel::where('id', Auth::user()->iduser)->first()->employeename;

        $tahun = date('d/m/Y');

        $pdf = Pdf::loadView(
            'admin.invoice.invoice-order',
            [
                'reference' => $reference,
                'customer'  => $customer,
                'customeraddress'   => $address,
                'customercontact'   => $phone,
                'year'      => $tahun,
                'sales'     => $sales,
                'listorders'        => $listorders,
                'total'     => $total,
            ]
        );
        return $pdf->download('invoice-orders.pdf');
    }
}

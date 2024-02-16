<?php

use App\Models\User;
use App\Models\ProductModel;
use App\Models\CustomerModel;
use App\Models\EmployeeModel;
use App\Models\CategoriesModel;
use App\Models\ProfessionModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Database\Query\IndexHint;
use App\Http\Controllers\BarcodeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProfessionController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TypeproductController;
use App\Models\TransactionModel;
use Illuminate\Database\Events\TransactionCommitted;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

//route login
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::middleware('onlyadmin')->group(function () {

        //route dashboard
        Route::get('dashboard-admin', [DashboardController::class, 'index']);

        //route profession
        Route::get('profession', [ProfessionController::class, 'index']);
        Route::post('profession', [ProfessionController::class, 'store']);
        Route::post('profession/{id}', [ProfessionController::class, 'update']);
        Route::get('profession/{id}', [ProfessionController::class, 'delete']);

        //route categories
        Route::get('categories', [CategoriesController::class, 'index']);
        Route::post('categories', [CategoriesController::class, 'store']);
        Route::post('categories/{id}', [CategoriesController::class, 'update']);
        Route::get('categories/{id}', [CategoriesController::class, 'delete']);

        //route type product
        Route::get('typeproduct', [TypeproductController::class, 'index']);
        Route::post('typeproduct', [TypeproductController::class, 'store']);
        Route::post('typeproduct/{id}', [TypeproductController::class, 'update']);
        Route::get('typeproduct/{id}', [TypeproductController::class, 'delete']);

        //route role
        Route::get('role', [RoleController::class, 'index']);
        Route::post('role', [RoleController::class, 'store']);
        Route::post('role/{id}', [RoleController::class, 'update']);
        Route::get('role/{id}', [RoleController::class, 'delete']);

        //route product
        Route::get('product', [ProductController::class, 'index']);
        Route::post('product', [ProductController::class, 'store']);
        Route::get('product-details/{id}', [ProductController::class, 'productdetail']);
        Route::get('product/{id}', [ProductController::class, 'show']);
        Route::post('product/{id}', [ProductController::class, 'update']);
        Route::get('delete-product/{id}', [ProductController::class, 'delete']);
        Route::get('printbarcode/{id}', [PdfController::class, 'printbarcode']);
        Route::get('scanbarcode', [BarcodeController::class, 'index']);
        Route::post('scanbarcodevalidasi', [BarcodeController::class, 'scanbarcodevalidasi']);

        //route suplier
        Route::get('supplier', [SupplierController::class, 'index']);
        Route::post('supplier', [SupplierController::class, 'store']);
        Route::post('supplier/{id}', [SupplierController::class, 'update']);
        Route::get('supplier/{id}', [SupplierController::class, 'delete']);

        //route customer
        Route::get('customer', [CustomerController::class, 'index']);
        Route::post('customer', [CustomerController::class, 'store']);
        Route::post('customer/{id}', [CustomerController::class, 'update']);
        Route::get('customer/{id}', [CustomerController::class, 'delete']);

        //route employee
        Route::get('employee', [EmployeeController::class, 'index']);
        Route::post('employee', [EmployeeController::class, 'store']);
        Route::get('employee/{id}', [EmployeeController::class, 'show']);
        Route::post('employee/{id}', [EmployeeController::class, 'update']);
        Route::get('delete-employee/{id}', [EmployeeController::class, 'delete']);

        //route users
        Route::get('users', [UserController::class, 'index']);
        Route::post('add-users/{id}', [UserController::class, 'store']);
        Route::post('users/{id}', [UserController::class, 'update']);
        Route::get('users/{id}', [UserController::class, 'delete']);

        //route shopping-cart
        Route::get('shopping-cart', [TransactionController::class, 'shoppingcart']);
        Route::get('add-to-cart/{id}', [TransactionController::class, 'addtocart']);
        Route::get('delete-shoppingcart/{id}', [TransactionController::class, 'deleteshoppingcart']);
        Route::get('delete-all-shoppingcart/{id}', [TransactionController::class, 'deleteallshoppingcart']);
        Route::post('checkout', [TransactionController::class, 'checkout']);

        //route orders
        Route::get('orders', [TransactionController::class, 'index']);
        Route::get('orders-details/{id}', [TransactionController::class, 'show']);
        Route::get('confirm-payment/{id}', [TransactionController::class, 'confirmpayment']);

        //route logout
        Route::get('logout', [AuthController::class, 'logout']);
    });
});

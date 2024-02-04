<?php

use App\Models\CategoriesModel;
use App\Models\ProfessionModel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarcodeController;
use Illuminate\Database\Query\IndexHint;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProfessionController;
use App\Http\Controllers\TypeproductController;
use App\Models\ProductModel;
use Barryvdh\DomPDF\Facade\Pdf;

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

        //route product
        Route::get('product', [ProductController::class, 'index']);
        Route::post('product', [ProductController::class, 'store']);
        Route::get('product-details/{id}', [ProductController::class, 'productdetail']);
        Route::get('product/{id}', [ProductController::class, 'show']);
        Route::post('product/{id}', [ProductController::class, 'update']);
        Route::get('delete-product/{id}', [ProductController::class, 'delete']);
        Route::get('printbarcode/{id}', [PdfController::class, 'printbarcode']);
        Route::get('scanbarcode', [BarcodeController::class, 'index']);

        //route logout
        Route::get('logout', [AuthController::class, 'logout']);
    });
});

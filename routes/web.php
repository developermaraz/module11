<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productsController;
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


Route::get('/product/add', function () {
    return view('add-product');
});
Route::get('/product/add', function () {
    return view('add-product');
});
Route::get('/sell/', function () {
    return view('sell-product');
});
Route::get('/product/update', function () {
    return view('update-product');
});

Route::get("/", [productsController::class, 'index']);
Route::get("/products", [productsController::class, 'getProducts']);
Route::post("/product/add", [productsController::class, 'addProduct']);
Route::get("/sell/{key}", [productsController::class, 'sellProductDataGet']);
Route::POST("/sell/{key}", [productsController::class, 'sellProduct']);
Route::get("/update/{key}", [productsController::class, 'UpdateProductDataGet']);
Route::POST("/update/{key}", [productsController::class, 'UpdateProduct']);
Route::get("/delete/{key}", [productsController::class, 'deleteProduct']);

Route::get("/history", [productsController::class, 'getSaleHistory']);
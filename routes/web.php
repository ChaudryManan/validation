<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/signup', [AuthController::class, 'showSignup']);
Route::post('/signup', [AuthController::class, 'signup']);

Route::get('/login', function () {
    return view('auth.login');
});
Route::post('/login', [AuthController::class, 'login']);
Route::get('/dashboard', function () {

    $products = Product::latest()->get(); // get all products

    return view('auth.dashboard', compact('products'));

})->middleware('auth');
Route::get('/add-product', function () {
    return view('auth.addproduct');
})->name('add.product')->middleware('auth');
Route::post('/store-product', [ProductController::class, 'store'])->middleware('auth');
Route::get('/product/{id}', [ProductController::class, 'show'])->middleware('auth');
Route::get('/add-to-cart/{id}', [CartController::class, 'add'])->middleware('auth');
Route::get('/cart', [CartController::class, 'index'])->middleware('auth');
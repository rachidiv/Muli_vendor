<?php

use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckOutController;
use App\Http\Controllers\Front\Homecontroller;
use App\Http\Controllers\Front\ProductController;
use Illuminate\Support\Facades\Route;
Route::get('/',[Homecontroller::class,'index'])->name('home');
Route::get('/products',[ProductController::class,'index'])->name('products.index');
Route::get('/products/{product:slug}',[ProductController::class,'show'])->name('products.show');
Route::resource('/cart',CartController::class);
Route::get('checkout',[CheckOutController::class,'create'])->name('checkout');
Route::post('checkout',[CheckOutController::class,'store'])->name('checkout');


require __DIR__.'/dashboard.php';
require __DIR__.'/auth.php';
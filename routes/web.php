<?php

use App\Http\Controllers\Front\Homecontroller;
use App\Http\Controllers\Front\ProductController;
use Illuminate\Support\Facades\Route;
Route::get('/',[Homecontroller::class,'index'])->name('home');
Route::get('/products',[ProductController::class,'index'])->name('products.index');
Route::get('/products/{product:slug}',[ProductController::class,'show'])->name('products.show');



require __DIR__.'/dashboard.php';
require __DIR__.'/auth.php';
<?php
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckOutController;
use App\Http\Controllers\Front\Homecontroller;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Auth\TwoFactorAuthenticationController;
use App\Http\Controllers\Front\currencyConverterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Helpers\Currency;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group([
    'prefix' => LaravelLocalization::setLocale(),

],function(){
    Route::get('/',[Homecontroller::class,'index'])->name('home');
    Route::get('/products',[ProductController::class,'index'])->name('products.index');
    Route::get('/products/{product:slug}',[ProductController::class,'show'])->name('products.show');
    Route::resource('/cart',CartController::class);
    Route::get('checkout',[CheckOutController::class,'create'])->name('checkout');
    Route::post('checkout',[CheckOutController::class,'store'])->name('checkout');
    Route::get('auth/user/2fa',[TwoFactorAuthenticationController::class,'index']);
    Route::post('currency',[currencyConverterController::class,'store'])
    ->name('currency.store');
});


require __DIR__.'/dashboard.php';
// require __DIR__.'/auth.php';
<?php

use App\Http\Controllers\Dashboard\Category as CategoriesController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\Profile;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
Route::group([
    'middleware' => ['auth','auth.type:user,super-admin'],
    'as' => 'dashboard.',
    'prefix' => 'dashboard',
    // 'namespace' => 'App\Http\Controller'
],function(){
    Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');
    Route::get('profile',[Profile::class,'edit'])->name('profile.edit');
    Route::patch('profile',[Profile::class,'update'])->name('profile.update');
    Route::put('/categories/{category}/restore',[CategoriesController::class,'restore'])->name('categories.restore');
    Route::get('/categories/trash',[CategoriesController::class,'trash'])->name('categories.trash');
    Route::delete('/categories/{category}/forceDelete',[CategoriesController::class,'forceDelete'])->name('categories.forceDelete');
    Route::resource('/categories',CategoriesController::class);
    Route::resource('/products',ProductController::class);

});


// 'as' => 'dashboard.',
// instead of using such as route('categories.index')
// we use  route('categories.categories.index')
// its related to name

######################################

// 'prefix' => 'dashboard',
// instead of using such as     Route::get('dashboard/', [DashboardController::class, 'index'])
// we use  Route::get('dashboard/', [DashboardController::class, 'index'])
// its related to original route

##########################################"

    // 'namespace' => 'App\Http\Controller'
    // Route::get('/', 'DashboardController@index')
    // DashboardController is inside Controller 
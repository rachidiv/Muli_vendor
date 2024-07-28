<?php

use App\Http\Controllers\Dashboard\Category as CategoriesController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
Route::group([
    'middleware' => ['auth'],
    'as' => 'dashboard.',
    'prefix' => 'dashboard',
    // 'namespace' => 'App\Http\Controller'
],function(){
    Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');

    Route::resource('/categories',CategoriesController::class);
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
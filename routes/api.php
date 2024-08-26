<?php

use App\Http\Controllers\Api\AccessTokenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('/products',ProductsController::class);
Route::post('auth/access-token',[AccessTokenController::class,'store'])
->middleware('guest:sanctum');
Route::delete('auth/access-token/{token?}',[AccessTokenController::class,'destroy'])
->middleware('auth:sanctum');
// sanctum is guard
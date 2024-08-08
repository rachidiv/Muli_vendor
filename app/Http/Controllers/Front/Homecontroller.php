<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class Homecontroller extends Controller
{
    public function index(){
        $products = Product::Active()
        ->latest()
        ->limit(8)
        ->get();
        return view('front.home',compact('products'));
    }}
<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\Cart\CartRepository;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $cart;
    public function __construct(CartRepository $cart)
    {
        $this->cart = $cart;
    }
    public function index()
    {   
        $cart = $this->cart;
        $items = $this->cart->get();
        return view('front.cart',compact('items','cart'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, CartRepository $cart)
    {
        // dd($request);
        $request->validate([
            'product_id' => ['required','int','exists:products,id'],
            'quantity' => ['nullable','int','min:1'],
        ]);
        $product = Product::findOrFail($request->post('product_id'));
        $cart->add($product,$request->post('quantity'));
        return redirect()->back()->with('success','Product added to cart');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'quantity' => ['nullable','int','min:1'],
        ]);
        $this->cart->update($id,$request->post('quantity'));
    }

    /**
     * Remove the specified resource from storage.
     */
    // i put parametre coming service provider befor parametre coming from route 
    public function destroy($id)
    {
        $this->cart->delete($id);
    }
}
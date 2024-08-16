<?php

namespace App\Listeners;

use App\Facades\Cart;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class DeductProductQuantity
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(...$orders): void
    {
        // dd($orders);

        // foreach(Cart::get() as $item){
        //     Product::where('id','=',$item->product_id)
        //     ->update([
        //         'quantity' =>DB::raw("quantity - {$item->quantity}")
        //     ]);

        // }
        foreach($orders as $order){
            foreach($order->products as $product){
                $product->decrement('quantity',$product->pivot->quantity);
            }
        }
        
    }
}
<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\OrderCreatedNotifiation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class sendOrderCreatedNotification
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

        foreach($orders as $order){
            $user = User::where('store_id',$order->store_id)->first();
            $user->notify(new OrderCreatedNotifiation($order));

            // $users = User::where('store_id',$order->store_id)->get();
            // Notification::send($users,new OrderCreatedNotifiation($order));
        }
    }
}
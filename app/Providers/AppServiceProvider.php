<?php

namespace App\Providers;

use App\Helpers\Currency;
use App\Listeners\DeductProductQuantity;
use App\Listeners\EmptyCart;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
  //   protected $listen = [
  //     'order.created' => [
  //       DeductProductQuantity::class,
  //       EmptyCart::class
  //         // Add more listeners as needed
  //     ],
  // ];

    public function register(): void
    {
       
    }
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        validator::extend('filter',function($attribute,$value,$params){
            return ! in_array(strtolower($value),$params);
            
        },'the value is forbidden');

      Paginator::useBootstrap();  
      // Event::listen('order.created', [DeductProductQuantity::class, 'handle']);
      Event::listen('order.created', [EmptyCart::class, 'handle']);
      
      // Event::listen(
      //   'order.created',
      //   DeductProductQuantity::class,
      //   EmptyCart::class
      // );
    }
}
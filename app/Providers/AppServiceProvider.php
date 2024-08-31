<?php

namespace App\Providers;

use App\Helpers\Currency;
use App\Listeners\DeductProductQuantity;
use App\Listeners\EmptyCart;
use App\Listeners\sendOrderCreatedNotification;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\HttpFoundation\JsonResponse;

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
      // JsonResource::withoutWrapping();
        validator::extend('filter',function($attribute,$value,$params){
            return ! in_array(strtolower($value),$params);
            
        },'the value is forbidden');

      Paginator::useBootstrap();  
      Event::listen('order.created', [DeductProductQuantity::class, 'handle']);
      Event::listen('order.created', [EmptyCart::class, 'handle']);
      Event::listen('order.created', [sendOrderCreatedNotification::class, 'handle']);
      
      // Event::listen(
      //   'order.created',
      //   DeductProductQuantity::class,
      //   EmptyCart::class
      // );
      // dd(config('abilities'));
      Gate::before(function($user,$ability){
        if($user->super_admin){
          return true;
        }
      });
      foreach(config('abilities') as $code => $lable){
        Gate::define($code,function($user) use ($code){
          // dd($code);
          // dd($user->hasAbility($code));
          return $user->hasAbility($code);
        });
      }
      
    }
}
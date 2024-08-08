<?php

namespace App\Providers;

use App\Helpers\Currency;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
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
    }
}
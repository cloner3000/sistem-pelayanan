<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Web;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $w = Web::first();
        View::share('w',$w);    
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}

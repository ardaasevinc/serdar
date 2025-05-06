<?php

namespace App\Providers;

use App\Models\Settings;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use App\Models\Faq;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */ public function boot(): void
    {
        $settings = Settings::first(); 
        View::share('settings', $settings);

        Paginator::useBootstrapFive(); 

       
        
    }

    

    

}

<?php

namespace App\Providers;

use App\Models\Settings;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use App\Models\Faq;

use App\Models\Slider;
use App\Models\About;
use App\Models\Partner;
use App\Models\Portfolio;
use App\Models\Data;
use App\Models\Service;
use App\Models\News;
use App\Models\Slidetext;
use App\Observers\ModelCacheObserver;



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

        Slider::observe(ModelCacheObserver::class);
        About::observe(ModelCacheObserver::class);
        Partner::observe(ModelCacheObserver::class);
        Portfolio::observe(ModelCacheObserver::class);
        Data::observe(ModelCacheObserver::class);
        Service::observe(ModelCacheObserver::class);
        News::observe(ModelCacheObserver::class);
        Slidetext::observe(ModelCacheObserver::class);
        
    }

    

    

}

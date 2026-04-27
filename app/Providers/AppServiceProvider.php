<?php

namespace App\Providers;

use App\Models\Settings;
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
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;

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
     */
    public function boot(): void
    {
        // Bootstrap 5 sayfalama desteğini aktif et
        Paginator::useBootstrapFive();

        /**
         * Veritabanı tablosu kontrolü:
         * Migration'lar çalışırken Settings tablosu henüz oluşmadığı için
         * deploy sırasında hata almanızı engeller.
         */
        if (!app()->runningInConsole() || Schema::hasTable('settings')) {
            $settings = Settings::first();
            View::share('settings', $settings);
        }

        // Observer Kayıtları
        // Not: Tablo kontrolü observer'lar için de güvenli bir yapı sunar
        if (Schema::hasTable('sliders')) { Slider::observe(ModelCacheObserver::class); }
        if (Schema::hasTable('abouts')) { About::observe(ModelCacheObserver::class); }
        if (Schema::hasTable('partners')) { Partner::observe(ModelCacheObserver::class); }
        if (Schema::hasTable('portfolios')) { Portfolio::observe(ModelCacheObserver::class); }
        if (Schema::hasTable('data')) { Data::observe(ModelCacheObserver::class); }
        if (Schema::hasTable('services')) { Service::observe(ModelCacheObserver::class); }
        if (Schema::hasTable('news')) { News::observe(ModelCacheObserver::class); }
        if (Schema::hasTable('slidetexts')) { Slidetext::observe(ModelCacheObserver::class); }
    }
}

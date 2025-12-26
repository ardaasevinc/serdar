<?php

namespace App\Observers;

use Illuminate\Support\Facades\Cache;

class ModelCacheObserver
{
    public function created($model)
    {
        $this->clearCache($model);
    }

    public function updated($model)
    {
        $this->clearCache($model);
    }

    public function deleted($model)
    {
        $this->clearCache($model);
    }

    protected function clearCache($model)
    {
        // Modele göre cache anahtarlarını temizle
        if ($model instanceof \App\Models\Slider) {
            Cache::forget('sliders');
        }

        if ($model instanceof \App\Models\About) {
            Cache::forget('about');
        }

        if ($model instanceof \App\Models\Partner) {
            Cache::forget('partners_active');
        }

        if ($model instanceof \App\Models\Portfolio) {
            Cache::forget('portfolio_published');
        }

        if ($model instanceof \App\Models\Data) {
            Cache::forget('data_published');
        }

        if ($model instanceof \App\Models\Service) {
            Cache::forget('services_published');
        }

        if ($model instanceof \App\Models\News) {
            Cache::forget('blog_published');
        }

        if ($model instanceof \App\Models\Slidetext) {
            Cache::forget('slidetext_published');
        }
    }
}


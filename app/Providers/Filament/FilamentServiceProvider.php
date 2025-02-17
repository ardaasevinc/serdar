<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;
use App\Models\Settings;

class FilamentServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // DB'den Logo Çek
        $settings = Settings::first();
        $adminLogo = $settings && $settings->site_logo
            ? asset('storage/' . $settings->site_logo)
            : asset('{{ $settings->site_logo }}');

        // Filament'e Özel Blade Temasını Kullan
        Filament::registerRenderHook('head.start', function () use ($adminLogo) {
            return view('components.filament-layout', compact('adminLogo'));
        });
    }
}


<?php



namespace App\Providers\Filament;

use Filament\Facades\Filament;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Support\Facades\FilamentAsset;
use App\Filament\Widgets\ContactMessagesWidget;

use Filament\Navigation\UserMenuItem;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;


class AdminPanelProvider extends PanelProvider
{



    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('admin')
            ->path('admin')
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->default()
            ->path('admin')
            ->login()
            ->brandLogo(asset('assets/images/be.svg'))
            ->darkModeBrandLogo(asset('assets/images/be.svg'))
            ->brandLogoHeight('40px')
            ->brandName('3.14 Agency Yönetim Paneli')
            ->favicon(asset('assets/images/be2.svg'))
             ->brandLogoHeight('18px')
            ->font('Google Sans')
            ->sidebarWidth('250px')
            ->sidebarCollapsibleOnDesktop()
            ->maxContentWidth('1000px')
            ->topNavigation(false)
            ->breadcrumbs(true)
            ->colors([
                'primary' => '#f5900d',
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
                ContactMessagesWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])


            ->authMiddleware([
                Authenticate::class,
            ]);
    }















    }


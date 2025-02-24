<?php

namespace App\Filament\Widgets;

use App\Models\Contact;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ContactMessagesWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Toplam İletişim Formları', Contact::count())
                ->description('Gelen toplam mesaj sayısı')
                ->color('success')
                ->icon('heroicon-o-envelope'),

            Stat::make('Bugün Gelen Formlar', Contact::whereDate('created_at', today())->count())
                ->description('Bugün gelen mesajlar')
                ->color('warning')
                ->icon('heroicon-o-clock'),

            Stat::make('Son 7 Günde Gelen Formlar', Contact::where('created_at', '>=', now()->subDays(7))->count())
                ->description('Son 7 gündeki mesajlar')
                ->color('info')
                ->icon('heroicon-o-calendar'),

           

            Stat::make('Son 30 Günde Gelen Formlar', Contact::where('created_at', '>=', now()->subDays(30))->count())
                ->description('Son 30 gündeki mesajlar')
                ->color('primary')
                ->icon('heroicon-o-chart-bar'), // Güncellendi!
        ];
    }
}

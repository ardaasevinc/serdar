<?php

namespace App\Filament\Resources\SettingsResource\Pages;

use App\Filament\Resources\SettingsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSettings extends ListRecords
{
    protected static string $resource = SettingsResource::class;

    protected function getHeaderActions(): array
    {
        // Eğer veritabanında hiç kayıt yoksa CreateAction gösterelim
        $settingsCount = \App\Models\Settings::count();

        if ($settingsCount === 0) {
            return [
                Actions\CreateAction::make(),
            ];
        }

        return []; // 1 kayıt varsa buton GÖSTERME
    }
}

<?php

namespace App\Filament\Resources\SlidetextResource\Pages;

use App\Filament\Resources\SlidetextResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSlidetext extends EditRecord
{
    protected static string $resource = SlidetextResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\SlidetextResource\Pages;

use App\Filament\Resources\SlidetextResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSlidetexts extends ListRecords
{
    protected static string $resource = SlidetextResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

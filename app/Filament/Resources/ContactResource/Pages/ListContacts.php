<?php

namespace App\Filament\Resources\ContactResource\Pages;

use App\Filament\Resources\ContactResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ContactExport;
use Filament\Actions\Action;

class ListContacts extends ListRecords
{
    protected static string $resource = ContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),

            Action::make('export')
                ->label('Excel Çıktısı Al')
                ->icon('heroicon-o-newspaper')
                ->action(fn() => Excel::download(new ContactExport, 'contact_list.xlsx'))
        ];
    }
}

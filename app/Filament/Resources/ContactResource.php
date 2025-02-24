<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Models\Contact;
use App\Exports\ContactExport;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Grid;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Resources\Resource;
use Filament\Tables\Actions\ExportBulkAction;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $pluralModelLabel = 'İletişim Bilgileri';
    protected static ?string $navigationIcon = 'heroicon-o-phone';
    protected static ?string $navigationLabel = 'İletişim';
    protected static ?string $pluralLabel = 'İletişim Formları';
    protected static ?string $modelLabel = 'İletişim Formu';
    protected static ?string $navigationGroup = 'İçerik Yönetimi';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Grid::make(2)->schema([
                    TextInput::make('first_name')->label('Ad')->required(),
                    TextInput::make('last_name')->label('Soyad')->required(),
                ]),
                TextInput::make('email')->label('E-Posta')->email()->required(),
                TextInput::make('phone_number')->label('Telefon')->required(),
                TextInput::make('subject')->label('Konu')->required(),
                Textarea::make('message')->label('Mesaj')->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('first_name')->label('Ad')->searchable()->sortable(),
                TextColumn::make('last_name')->label('Soyad')->searchable()->sortable(),
                TextColumn::make('email')->label('E-Posta')->searchable(),
                TextColumn::make('phone_number')->label('Telefon'),
                TextColumn::make('subject')->label('Konu')->searchable(),
                TextColumn::make('created_at')->label('Tarih')->dateTime('d.m.Y H:i')->sortable(),
            ])
            ->filters([])

            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->modalHeading('Silme Onayı')
                    ->modalDescription('Bu kaydı silmek istediğinizden emin misiniz?')
                    ->modalSubmitActionLabel('Evet, Sil'),
            ])
        
            ->bulkActions([
                ExportBulkAction::make()
                    ->label('Excel Olarak Dışa Aktar')
                    ->exporter(ContactExport::class) // Hata burada düzeltildi
                    ->icon('heroicon-o-newspaper'),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContacts::route('/'),
        ];
    }
}

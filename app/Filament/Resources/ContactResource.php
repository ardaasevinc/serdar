<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Models\Contact;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Grid;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Resources\Resource;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $pluralModelLabel = 'İletişim Bilgileri';
    protected static ?string $navigationIcon = 'heroicon-o-phone';
    protected static ?string $navigationLabel = 'iletişim';
    protected static ?string $pluralLabel = 'İletişim Formları';
    protected static ?string $modelLabel = 'İletişim Formu';
    protected static ?string $navigationGroup = 'İçerik Yönetimi';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Grid::make(2)->schema([
                    TextInput::make('first_name')
                        ->label('Ad')
                        ->required(),
                    TextInput::make('last_name')
                        ->label('Soyad')
                        ->required(),
                ]),
                TextInput::make('email')
                    ->label('E-Posta')
                    ->email()
                    ->required(),
                TextInput::make('phone_number')
                    ->label('Telefon')
                    ->required(),
                TextInput::make('subject')
                    ->label('Konu')
                    ->required(),
                Textarea::make('message')
                    ->label('Mesaj')
                    ->required(),
                Textarea::make('google_map')
                    ->label('Google Harita Kodu')
                    ->rows(3)
                    ->nullable(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('first_name')
                    ->label('Ad')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('last_name')
                    ->label('Soyad')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->label('E-Posta')
                    ->searchable(),
                TextColumn::make('phone_number')
                    ->label('Telefon'),
                TextColumn::make('subject')
                    ->label('Konu')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Tarih')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->filters([
                // Gerekirse filtreler ekleyebilirsin.
            ])

            ->emptyStateIcon(asset('custom-empty.svg'))
            ->emptyStateHeading('Henüz bir kayıt eklenmemiş.')
            ->emptyStateDescription('Bu alana kayıtlarınızı ekleyebilirsiniz.')

            
            ->actions([
                Tables\Actions\EditAction::make(),

                Tables\Actions\DeleteAction::make()
                    ->modalHeading('Silme Onayı') // Modal başlığını özelleştir
                    ->modalDescription('Bu kaydı silmek istediğinizden emin misiniz?') // Açıklama ekle
                    ->modalSubmitActionLabel('Evet, Sil') // Onay butonuna özel metin ekle
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'view' => Pages\listContacts::route('/{record}'),
        ];
    }
}

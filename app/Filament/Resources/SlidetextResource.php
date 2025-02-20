<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SlidetextResource\Pages;
use App\Models\Slidetext;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class SlidetextResource extends Resource
{
    protected static ?string $model = Slidetext::class;

    protected static ?string $pluralModelLabel = 'Kayan Yazı';
    protected static ?string $navigationIcon = 'heroicon-o-information-circle';
    protected static ?string $navigationLabel = 'Kayan Yazı';
    protected static ?string $navigationGroup = 'İçerik Yönetimi';
    protected static ?string $modelLabel = 'Kayan Yazı';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            TextInput::make('title')
                ->required()
                ->maxLength(255),

            TextInput::make('url')
                ->url()
                ->maxLength(255),

            TextInput::make('order')
                ->numeric() // Sadece sayısal giriş sağlar
                ->default(0) // Varsayılan değer
                ->required()
                ->label('Sıralama') // Kullanıcıya açıklayıcı bir isim verir
                ->helperText('Küçük değerler önce gösterilir.'), // Bilgilendirici metin ekler

            Toggle::make('is_published')
                ->label('Yayında mı?')
                ->default(false),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->sortable()->searchable(),
                TextColumn::make('url')->limit(50),
                TextColumn::make('order')->sortable()->label('Sıralama'),
                TextColumn::make('created_at')->dateTime('d M Y'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListSlidetexts::route('/'),
            'create' => Pages\CreateSlidetext::route('/create'),
            'edit' => Pages\EditSlidetext::route('/{record}/edit'),
        ];
    }
}

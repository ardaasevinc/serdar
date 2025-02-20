<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataResource\Pages;
use App\Models\Data;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Resources\Resource;

class DataResource extends Resource
{
    protected static ?string $model = Data::class;
    protected static ?string $pluralModelLabel = 'Datalar';
    protected static ?string $navigationIcon = 'heroicon-o-information-circle';
    protected static ?string $navigationLabel = 'Veri içeriği';
    protected static ?string $navigationGroup = 'İçerik Yönetimi';

    protected static ?string $modelLabel = 'Hakkımızda';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            TextInput::make('data')
                ->numeric()
                ->required()
                ->label('Sayı - veri'),

            TextInput::make('title')
                ->required()
                ->maxLength(255)
                ->label('Başlık'),

            TextInput::make('icon')
                ->required()
                ->maxLength(255)
                ->label('İkon'),

            Toggle::make('is_published')
                ->label('Yayınlandı mı?')
                ->default(true),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            TextColumn::make('rakam')
                ->sortable()
                ->label('Rakam'),

            TextColumn::make('title')
                ->searchable()
                ->label('Başlık'),

            TextColumn::make('icon')
                ->label('İkon'),

            BooleanColumn::make('is_published')
                ->label('Yayınlandı mı?'),
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
            'index' => Pages\ListData::route('/'),
            'create' => Pages\CreateData::route('/create'),
            'edit' => Pages\EditData::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\IconColumn;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationGroup = 'İçerik Yönetimi';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('title')->label('Başlık')->required(),
                TextInput::make('slug')->label('Slug')->disabled(),

                Select::make('type')
                    ->label('Sayfa Tipi')
                    ->options([
                        'menu' => 'Menü',
                        'submenu' => 'Alt Menü',
                        'home' => 'Ana Sayfa',
                        'footer' => 'Alt Bilgi',
                    ])
                    ->required(),

                Select::make('parent_menu_id')
                    ->label('Bağlı Olduğu Menü')
                    ->options(Page::where('type', 'menu')->pluck('title', 'id')->toArray())
                    ->nullable()
                    ->visible(fn($get) => $get('type') === 'submenu'), // Sadece alt menü seçilirse görünür

                Toggle::make('is_published')->label('Yayınlandı mı?')->default(true),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('Başlık')->sortable()->searchable(),
                TextColumn::make('type')->label('Sayfa Tipi')->sortable(),
                IconColumn::make('is_published')
                    ->label('Durum')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}

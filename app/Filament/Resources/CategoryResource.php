<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Form;
use Filament\Tables\Table;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $pluralModelLabel = 'Haber Kategori Yönetimi';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Haber Kategoriler';
    protected static ?string $navigationGroup = 'Haber Yönetimi';

    protected static ?string $modelLabel = 'Kategori';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Kategori Adı')
                    ->required()
                    ->unique(ignoreRecord: true) // Aynı kategori adını tekrar eklemeyi engeller
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('name')->label('Kategori Adı')->sortable()->searchable(),
                TextColumn::make('created_at')->label('Oluşturulma Tarihi')->dateTime(),
            ])
            ->filters([])

            ->emptyStateIcon(asset('custom-empty.svg'))
            ->emptyStateHeading('Henüz bir Kategori eklenmemiş.')
            ->emptyStateDescription('Bu alana kategorileriinizi ekleyebilirsiniz.')

            
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortfolioCategoryResource\Pages;
use App\Models\PortfolioCategory;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class PortfolioCategoryResource extends Resource
{
    protected static ?string $model = PortfolioCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $pluralModelLabel = 'Portfolio Kategori';
    protected static ?string $navigationLabel = 'Portfolio Kategorileri';
    protected static ?string $pluralLabel = 'Portfolio Kategorileri';
    protected static ?string $slug = 'portfolio-categories';

    protected static ?string $modelLabel = 'Portfolio Kategori';
    protected static ?string $navigationGroup = 'Portfolyo Yönetimi';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->unique(PortfolioCategory::class, 'name')
                    ->maxLength(255),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('created_at')->dateTime(),

                
            ])

        

            ->emptyStateIcon(asset('custom-empty.svg'))
            ->emptyStateHeading('Henüz bir portfolyo kategorisi eklenmemiş.')
            ->emptyStateDescription('Bu alanda portfolyo kategorileriniz listeleyebilirsiniz.')

            
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
            'index' => Pages\ListPortfolioCategories::route('/'),
            'create' => Pages\CreatePortfolioCategory::route('/create'),
            'edit' => Pages\EditPortfolioCategory::route('/{record}/edit'),
        ];

    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortfolioResource\Pages;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class PortfolioResource extends Resource
{
    protected static ?string $model = Portfolio::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $pluralModelLabel = 'Portfolio';
    protected static ?string $navigationLabel = 'Portfolyo';
    protected static ?string $pluralLabel = 'Portfolyolar';
    protected static ?string $slug = 'portfolio-yonetimi'; // Türkçe karakter sorun yaratabilir, düzelttim
    protected static ?string $modelLabel = 'Portfolio';
    protected static ?string $navigationGroup = 'İçerik Yönetimi';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Textarea::make('description'),
                Select::make('portfolio_category_id')
                    ->label('Kategori')
                    ->options(PortfolioCategory::query()->pluck('name', 'id')) // `toArray()` kaldırıldı
                    ->searchable()
                    ->preload(),
                SpatieMediaLibraryFileUpload::make('images')
                    ->multiple()
                    ->image()
                    ->collection('portfolio_images'),
                Toggle::make('is_published')->label('Yayında mı?')->default(true), // is_active yerine is_published kullanıldı
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->sortable()->searchable(),
                TextColumn::make('category.name')->label('Kategori')->sortable(),
                BooleanColumn::make('is_published')->label('Yayın Durumu'), 
                TextColumn::make('created_at')->dateTime(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Yayın Durumu')
                    ->trueLabel('Yayında')
                    ->falseLabel('Taslak'),
            ])
            ->emptyStateIcon('heroicon-o-document') 
            ->emptyStateHeading('Henüz bir kayıt eklenmemiş.')
            ->emptyStateDescription('Bu alana kayıtlarınızı ekleyebilirsiniz.')
        ->actions([
            Tables\Actions\EditAction::make(),

            Tables\Actions\DeleteAction::make()
                ->modalHeading('Silme Onayı') 
                ->modalDescription('Bu kaydı silmek istediğinizden emin misiniz?') 
                ->modalSubmitActionLabel('Evet, Sil') 
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
            'index' => Pages\ListPortfolios::route('/'),
            'create' => Pages\CreatePortfolio::route('/create'),
            'edit' => Pages\EditPortfolio::route('/{record}/edit'),
        ];
    }
}

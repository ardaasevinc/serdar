<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SliderResource\Pages;
use App\Models\Slider;
use Filament\Forms;
use Filament\Forms\Components\Concerns\HasMaxHeight;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms\Components\RichEditor;

class SliderResource extends Resource
{
    protected static ?string $model = Slider::class;
    protected static ?string $pluralModelLabel = 'Banner Yönetimi';
    protected static ?string $navigationIcon = 'heroicon-o-film';
    protected static ?string $navigationLabel = 'Sliderlar';
    protected static ?string $navigationGroup = 'İçerik Yönetimi';

    protected static ?string $modelLabel = 'Banner';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                RichEditor::make('title1')
                    ->label('Başlık 1')
                    ->required()
                    ->maxLength(255),

                TextInput::make('title2')
                    ->label('Başlık 2')
                    ->maxLength(255),

                Textarea::make('content')
                    ->label('İçerik')
                    ->rows(3)
                    ->nullable(),

                FileUpload::make('image')
                    ->label('Görsel')
                    ->disk('public') // Public disk kullanıyoruz
                    ->directory('sliders') // Slider görselleri için özel klasör
                    ->imagePreviewHeight('250')
                    ->image()
                    ->nullable(),
            ]);
            
    }

    public static function table(Table $table): Table
    {
        
        return $table
            ->columns([
                TextColumn::make('title1')->label('Başlık 1')->sortable()->searchable(),
                TextColumn::make('title2')->label('Başlık 2')->sortable(),
                ImageColumn::make('image')->label('Görsel'),
                TextColumn::make('created_at')->label('Eklenme Tarihi')->dateTime(),
            ])
            ->filters([])
            
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
            'index' => Pages\ListSliders::route('/'),
            'create' => Pages\CreateSlider::route('/create'),
            'edit' => Pages\EditSlider::route('/{record}/edit'),
        ];
    }
}

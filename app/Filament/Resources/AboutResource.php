<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutResource\Pages;
use App\Models\About;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AboutResource extends Resource
{
    protected static ?string $model = About::class;
    protected static ?string $pluralModelLabel = 'Hakkımızda';
    protected static ?string $navigationIcon = 'heroicon-o-information-circle';
    protected static ?string $navigationLabel = 'Hakkımızda';
    protected static ?string $navigationGroup = 'İçerik Yönetimi';

    protected static ?string $modelLabel = 'Hakkımızda';

    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Başlık')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan('full'),

                Forms\Components\RichEditor::make('content1')
                    ->label('İçerik 1')
                    ->required(),

                Forms\Components\RichEditor::make('content2')
                    ->label('İçerik 2')
                    ->nullable(),

                Forms\Components\FileUpload::make('image1')
                    ->directory(fn() => strtolower(class_basename(static::getModel())))
                    ->label('Görsel 1')
                    ->image()
                    ->directory('about')
                    ->helperText('Lütfen 400x496 çözünürlüklü bir görsel yükleyin.'),


                Forms\Components\FileUpload::make('image2')
                    ->directory(fn() => strtolower(class_basename(static::getModel())))
                    ->label('Görsel 2')
                    ->image()
                    ->directory('about')
                ->helperText('Lütfen 290x316 çözünürlüklü bir görsel yükleyin.'),

                Forms\Components\Toggle::make('is_published')
                    ->label('Yayında mı?')
                    ->default(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Başlık')->searchable(),
                Tables\Columns\ImageColumn::make('image1')->label('Görsel 1'),
                Tables\Columns\ImageColumn::make('image2')->label('Görsel 2'),
                Tables\Columns\TextColumn::make('created_at')->label('Eklenme Tarihi')->dateTime(),
            ])

            ->filters([
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Yayın Durumu')
                    ->trueLabel('Yayında')
                    ->falseLabel('Taslak'),
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
            'index' => Pages\ListAbouts::route('/'),
            'create' => Pages\CreateAbout::route('/create'),
            'edit' => Pages\EditAbout::route('/{record}/edit'),
        ];
    }
}

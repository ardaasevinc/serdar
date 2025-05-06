<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Models\News;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;
    protected static ?string $pluralModelLabel = 'Haberler';
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationLabel = 'Haberler';
    protected static ?string $navigationGroup = 'Haber Yönetimi';
    protected static ?string $modelLabel = 'Haberler';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(12)
                    ->schema([
                        Forms\Components\Group::make([
                            FileUpload::make('image')
                                ->disk('uploads')
                                ->label('Görsel')
                                ->directory('news')
                                ->visibility('public')
                                ->imagePreviewHeight('250')
                                ->helperText('Lütfen 770x428 çözünürlüklü bir görsel yükleyin.'),
                        ])
                            ->columnSpan(4), // Sol: 4 kolon sadece Görsel

                        Forms\Components\Group::make([
                            Forms\Components\TextInput::make('title')
                                ->label('Başlık')
                                ->required()
                                ->maxLength(255)
                                ->columnSpan('full'),

                            Forms\Components\RichEditor::make('content')
                                ->label('İçerik')
                                ->required(),

                            Forms\Components\Select::make('category_id')
                                ->label('Kategori')
                                ->relationship('category', 'name')
                                ->required()
                                ->searchable(),

                            Forms\Components\Toggle::make('is_published')
                                ->label('Yayında mı?')
                                ->default(false),
                        ])
                            ->columnSpan(8), // Sağ: 8 kolon diğer her şey
                    ]),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Başlık')->searchable(),
                Tables\Columns\ImageColumn::make('image')->label('Görsel'),
                Tables\Columns\IconColumn::make('is_published')->label('Yayında mı?')->boolean(),
                Tables\Columns\TextColumn::make('created_at')->label('Eklenme Tarihi')->dateTime(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Yayın Durumu')
                    ->trueLabel('Yayında')
                    ->falseLabel('Taslak'),
            ])

            ->emptyStateIcon(asset('custom-empty.svg'))
            ->emptyStateHeading('Henüz bir haber eklenmemiş.')
            ->emptyStateDescription('Bu alana haberlerinizi ekleyebilirsiniz. Unutmayın, kategori eklemeden haber ekleyemezsiniz.')


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
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}

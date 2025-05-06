<?php


namespace App\Filament\Resources;

use App\Filament\Resources\PageContentResource\Pages;
use App\Models\PageContent;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;

class PageContentResource extends Resource
{
    protected static ?string $model = PageContent::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $pluralModelLabel = 'Sayfa İçerik Yönetimi';
    protected static ?string $navigationLabel = 'Sayfa İçerik Yönetimi';
    protected static ?string $navigationGroup = 'İçerik Yönetimi';
    protected static ?string $modelLabel = 'İçerik';
    protected static ?int $navigationSort = 2;

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(12)
                    ->schema([
                        Forms\Components\Group::make([
                            FileUpload::make('image')
                                ->label('Görsel')
                                ->image(),
                        ])
                        ->columnSpan(4), // Sol 4 kolon: Görsel
    
                        Forms\Components\Group::make([
                            Select::make('page_id')
                                ->relationship('page', 'title')
                                ->label('Bağlı Sayfa')
                                ->required(),
    
                            TextInput::make('title')
                                ->label('Başlık')
                                ->required()
                                ->maxLength(255),
    
                            RichEditor::make('content')
                                ->label('İçerik')
                                ->required(),
    
                            TextInput::make('order')
                                ->label('Sıra')
                                ->numeric()
                                ->default(0),
                        ])
                        ->columnSpan(8), // Sağ 8 kolon: Diğer alanlar
                    ]),
            ]);
    }
    
    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('page.title')
                    ->label('Bağlı Sayfa')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('title')
                    ->label('Başlık')
                    ->sortable()
                    ->searchable(),

                ImageColumn::make('image')
                    ->label('Görsel')
                    ->size(50),

                TextColumn::make('order')
                    ->label('Sıra')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('page_id')
                    ->relationship('page', 'title')
                    ->label('Sayfaya Göre Filtrele'),
            ])

            ->emptyStateIcon(asset('custom-empty.svg'))
            ->emptyStateHeading('Henüz bir sayfa içeriği eklenmemiş.')
            ->emptyStateDescription('Bu alana sayfa içeriği ekleyebilirsiniz.Unutmayın, içerik eklemeden önce sayfa oluşturmalısınız.')


            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->defaultSort('order', 'asc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPageContents::route('/'),
            'create' => Pages\CreatePageContent::route('/create'),
            'edit' => Pages\EditPageContent::route('/{record}/edit'),
        ];
    }
}

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
            Forms\Components\Grid::make(12)
                ->schema([
                    Forms\Components\Group::make([
                        Forms\Components\Select::make('icon')
                            ->required()
                            ->label('İkon')
                            ->options([
                                'icon-award' => 'Ödül',
                                'icon-badge' => 'Rozet',
                                'icon-close' => 'Kapat',
                                'icon-color-sample' => 'Renk Örneği',
                                'icon-complete' => 'Tamamlandı',
                                'icon-design' => 'Tasarım',
                                'icon-digital-services' => 'Dijital Hizmetler',
                                'icon-down-arrow' => 'Aşağı Ok',
                                'icon-down-right' => 'Sağ Aşağı Ok',
                                'icon-front-end' => 'Ön Yüz Geliştirme',
                                'icon-graphic-design' => 'Grafik Tasarım',
                                'icon-graphic-design-1' => 'Grafik Tasarım V2',
                                'icon-group' => 'Grup',
                                'icon-idea' => 'Fikir',
                                'icon-job-promotion' => 'İş Terfisi',
                                'icon-layers' => 'Katmanlar',
                                'icon-left-arrow' => 'Sol Ok',
                                'icon-marketing' => 'Pazarlama',
                                'icon-magnifying-glass' => 'Büyüteç',
                                'icon-minus' => 'Eksi',
                                'icon-mobile-app' => 'Mobil Uygulama',
                                'icon-mobile-development' => 'Mobil Geliştirme',
                                'icon-online-shopping' => 'Online Alışveriş',
                                'icon-pdf-file' => 'PDF Dosyası',
                                'icon-pen-tool' => 'Kalem Aracı',
                                'icon-phone' => 'Telefon',
                                'icon-phone-call' => 'Telefon Araması',
                                'icon-place' => 'Konum',
                                'icon-plus' => 'Artı',
                                'icon-recommend' => 'Öneri',
                                'icon-right-arrow' => 'Sağ Ok',
                                'icon-schedule' => 'Zamanlama',
                                'icon-shopping-cart' => 'Alışveriş Sepeti',
                                'icon-success' => 'Başarılı',
                                'icon-team' => 'Ekip',
                                'icon-technology' => 'Teknoloji',
                                'icon-tick' => 'Onay İşareti',
                                'icon-up-arrow' => 'Yukarı Ok',
                                'icon-web-development' => 'Web Geliştirme',
                                'icon-wreath' => 'Çelenk',
                            ]),
                    ])
                    ->columnSpan(4),
                    
    
                    Forms\Components\Group::make([
                        Forms\Components\TextInput::make('data')
                            ->numeric()
                            ->required()
                            ->label('Sayı - veri'),
    
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->label('Başlık'),
    
                        Forms\Components\Toggle::make('is_published')
                            ->label('Yayınlandı mı?')
                            ->default(true),
                    ])
                    ->columnSpan(8), // Sağ 8 kolon (data + title + toggle)
                ]),
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

        ->emptyStateIcon(asset('custom-empty.svg'))
        ->emptyStateHeading('Henüz bir veri eklenmemiş.')
        ->emptyStateDescription('Bu alana rakamsal veri ve başlık ekleyebilirsiniz.')


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

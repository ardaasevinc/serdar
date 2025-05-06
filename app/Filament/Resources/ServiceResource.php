<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;
    protected static ?string $pluralModelLabel = 'Servisler';
    protected static ?string $navigationIcon = 'heroicon-o-wrench';
    protected static ?string $navigationLabel = 'Hizmetler';
    protected static ?string $navigationGroup = 'İçerik Yönetimi';

    protected static ?string $modelLabel = 'Servis';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(12)
                    ->schema([
                        Forms\Components\Group::make([
                            FileUpload::make('image')
                                ->label('Görsel')
                                ->disk('uploads')
                                ->directory('services')
                                ->visibility('public')
                                ->imagePreviewHeight('250')
                                ->image()
                                ->nullable()
                                ->helperText('770x381 ölçüsünde bir görsel yükleyin.'),
                        ])
                        ->columnSpan(4), // Sol 4 kolon: Görsel
    
                        Forms\Components\Group::make([
                            Select::make('icon')
                                ->label('İkon Seç')
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
                                ])
                                
                                ->searchable()
                                ->helperText('Bir ikon seçin, bu ikon hizmet kartında görünecektir.'),
    
                            TextInput::make('title')
                                ->label('Başlık')
                                ->required()
                                ->maxLength(255),
    
                            RichEditor::make('content')
                                ->label('İçerik')
                                ->nullable(),
    
                            Toggle::make('is_published')
                                ->label('Yayında mı?')
                                ->default(false),
                        ])
                        ->columnSpan(8), // Sağ 8 kolon: Diğer alanlar
                    ]),
            ]);
    }
    

    public static function table(Table $table): Table
    {

        

        return $table
            ->columns([
                TextColumn::make('title')->label('Başlık')->sortable()->searchable(),
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}

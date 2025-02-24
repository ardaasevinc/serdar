<?php

namespace App\Filament\Resources;

use App\Models\Settings;
use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use App\Filament\Resources\SettingsResource\Pages;

class SettingsResource extends Resource
{
    protected static ?string $model = Settings::class;

    protected static ?string $pluralModelLabel = 'Ayarlar';
    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationLabel = 'Ayarlar';
    protected static ?string $navigationGroup = 'İçerik Yönetimi';

    protected static ?string $modelLabel = 'Ayar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('key')
                    ->label('Ayar Anahtarı')
                    ->options([
                        'site_name' => 'Site Adı',
                        'site_logo' => 'Site Logosu',
                        'favicon' => 'Favicon',
                        'site_email' => 'E-Posta',
                        'site_phone' => 'Telefon',
                        'meta_title' => 'Meta Başlık',
                        'meta_description' => 'Meta Açıklama',
                        'meta_keywords' => 'Meta Anahtar Kelimeler',
                        'meta_image' => 'Meta Görseli',
                        'facebook_url' => 'Facebook URL',
                        'instagram_url' => 'Instagram URL',
                        'twitter_url' => 'Twitter URL',
                        'linkedin_url' => 'LinkedIn URL',
                        'youtube_url' => 'YouTube URL',
                        'google_tag_manager' => 'Google Tag Manager',
                        'google_analytics' => 'Google Analytics',
                        'facebook_pixel' => 'Facebook Pixel',
                        'tiktok_pixel' => 'Tiktok Pixel',
                        'custom_css' => 'Özel CSS',
                        'custom_js' => 'Özel JS',
                        'maintenance_mode' => 'Bakım Modu',
                        'maintenance_message' => 'Bakım Mesajı',
                    ])
                    ->live()
                    ->required(),

                Textarea::make('value')
                    ->label('Ayar Değeri')
                    ->hidden(fn($get) => in_array($get('key'), ['site_logo', 'favicon', 'meta_image']))
                    ->nullable(),

                // **Resim Yükleme Alanları**
                FileUpload::make('value')
                    ->label('Site Logosu')
                    ->directory('settings')
                    ->image()
                    ->visibility('public')
                    ->hidden(fn($get) => $get('key') !== 'site_logo'),

                FileUpload::make('value')
                    ->label('Favicon')
                    ->directory('settings')
                    ->image()
                    ->visibility('public')
                    ->hidden(fn($get) => $get('key') !== 'favicon'),

                FileUpload::make('value')
                    ->label('Meta Görseli')
                    ->directory('settings')
                    ->image()
                    ->visibility('public')
                    ->hidden(fn($get) => $get('key') !== 'meta_image'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('key')->label('Anahtar')->sortable(),
                TextColumn::make('value')
                    ->label('Değer')
                    ->formatStateUsing(
                        fn($state, $record) => in_array($record->key, ['site_logo', 'favicon', 'meta_image'])
                            ? "<img src='/storage/$state' width='50' />"
                            : $state
                    )
                    ->html()
                    ->sortable(),
            ])
            ->defaultSort('key')
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSettings::route('/'),
            'edit' => Pages\EditSettings::route('/{record}/edit'),
        ];
    }
}

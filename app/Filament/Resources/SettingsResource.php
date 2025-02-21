<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingsResource\Pages;
use App\Models\Settings;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;

use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms\Components\TagsInput;






class SettingsResource extends Resource
{
    protected static ?string $model = Settings::class;
    protected static ?string $pluralModelLabel = 'Genel Ayarlar';
    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationLabel = 'Genel Ayarlar';
    protected static ?string $navigationGroup = 'Site Yönetimi';

    protected static ?string $modelLabel = 'Ayarlar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('site_name')->label('Site Adı')->required(),
                TextInput::make('site_email')->label('E-posta'),
                FileUpload::make('site_logo')->label('Site Logosu')->disk('public')->directory('settings'),
                FileUpload::make('favicon')->label('Favicon')->disk('public')->directory('settings'),


                TextInput::make('site_phone')->label('Telefon'),
                Textarea::make('site_address')->label('Adres'),

                TextInput::make('meta_title')->label('SEO Başlığı'),
                Textarea::make('meta_description')->label('SEO Açıklaması'),
                TagsInput::make('meta_keywords')
                    ->label('SEO Anahtar Kelimeleri')
                    ->placeholder('Anahtar kelimeleri girin...')
                    ->suggestions(['SEO', 'Google', 'Laravel', 'Filament', 'PHP'])
                    ->separator(','),

                TextInput::make('facebook_url')->label('Facebook URL'),
                TextInput::make('instagram_url')->label('Instagram URL'),
                TextInput::make('twitter_url')->label('Twitter URL'),
                TextInput::make('linkedin_url')->label('LinkedIn URL'),
                TextInput::make('youtube_url')->label('YouTube URL'),

                TextInput::make('google_tag_manager')
                    ->label('Google Tag Manager')
                    ->columnSpan('full')
                    ->helperText('Google Tag Manager Kodunu giriniz. GTM-XXXXXX'),

                TextInput::make('google_analytics')
                    ->label('Google Analytics')
                    ->columnSpan('full')
                    ->helperText('Google Analytics Kodunu yazınız. G-XXXXXXXXXX'),

                TextInput::make('facebook_pixel')
                    ->label('Facebook Piksel')
                    ->columnSpan('full')
                    ->helperText('Facebook Pixel Kodunu yazınız. 123456789012345'),

                TextInput::make('tiktok_pixel')
                    ->label('TikTok Piksel')
                    ->columnSpan('full')
                    ->helperText('Tiktok Pixel Kodunu yazınız. ABCDEF1234567890'),

                Textarea::make('custom_css')
                    ->label('Özel CSS')
                    ->rows(5)
                    ->extraAttributes(['style' => 'font-family: monospace; '])
                    ->columnSpan('full'),

                Textarea::make('custom_js')
                    ->label('Özel JavaScript')
                    ->rows(5)
                    ->extraAttributes(['style' => 'font-family: monospace; '])
                    ->columnSpan('full'),



                RichEditor::make('maintenance_message')->label('Bakım Modu Mesajı')->extraAttributes(['rows' => 3])->columnSpan('full'),
                Toggle::make('maintenance_mode')->label('Bakım Modu'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('site_name')->label('Site Adı'),
                TextColumn::make('site_email')->label('E-posta'),
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
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSettings::route('/create'),
            'edit' => Pages\EditSettings::route('/{record}/edit'),
        ];
    }
}

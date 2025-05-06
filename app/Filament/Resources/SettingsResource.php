<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingsResource\Pages;
use App\Filament\Resources\SettingsResource\RelationManagers;
use App\Models\Settings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SettingsResource extends Resource
{
    protected static ?string $model = Settings::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Site Ayarları';
    protected static ?string $navigationGroup = 'İçerik Yönetimi';

    protected static ?string $modelLabel = 'Ayar';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\Grid::make(12)
                ->schema([
                    Forms\Components\Card::make()
                        ->schema([
                            Forms\Components\FileUpload::make('light_logo')
                                ->label('Açık Tema Logosu')
                                ->disk('uploads')
                                ->directory('Logos')
                                ->visibility('public')
                                ->image()
                                ->imageEditor()
                                ->imagePreviewHeight(100),
                            
                            Forms\Components\FileUpload::make('dark_logo')
                                ->label('Koyu Tema Logosu')
                                ->disk('uploads')
                                ->directory('Logos')
                                ->visibility('public')
                                ->image()
                                ->imageEditor()
                                ->imagePreviewHeight(100),
                            
                            Forms\Components\FileUpload::make('favicon')
                                ->label('Favicon')
                                ->disk('uploads')
                                ->directory('Logos')
                                ->visibility('public')
                                ->image()
                                ->imageEditor()
                                ->imagePreviewHeight(64),
                        ])
                        ->columnSpan(4),

                    Forms\Components\Card::make()
                        ->schema([
                            Forms\Components\TextInput::make('site_name')
                                ->label('Site Adı')
                                ->maxLength(255),
                            Forms\Components\TextInput::make('site_email')
                                ->label('E-Posta')
                                ->email()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('site_phone')
                                ->label('Telefon')
                                ->tel()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('meta_title')
                                ->label('Meta Başlık')
                                ->maxLength(255),
                            Forms\Components\Textarea::make('meta_description')
                                ->label('Meta Açıklama')
                                ->columnSpanFull(),
                            Forms\Components\TextInput::make('meta_keywords')
                                ->label('Meta Anahtar Kelimeler')
                                ->maxLength(255),
                            Forms\Components\FileUpload::make('meta_image')
                                ->label('Meta Görsel')
                                ->disk('uploads')
                                ->directory('Gallery')
                                ->visibility('public')
                                ->image()
                                ->imageEditor()
                                ->imagePreviewHeight(100),
                            Forms\Components\TextInput::make('facebook_url')
                                ->label('Facebook URL')
                                ->maxLength(255),
                            Forms\Components\TextInput::make('instagram_url')
                                ->label('Instagram URL')
                                ->maxLength(255),
                            Forms\Components\TextInput::make('twitter_url')
                                ->label('Twitter URL')
                                ->maxLength(255),
                            Forms\Components\TextInput::make('linkedin_url')
                                ->label('LinkedIn URL')
                                ->maxLength(255),
                            Forms\Components\TextInput::make('youtube_url')
                                ->label('YouTube URL')
                                ->maxLength(255),
                            Forms\Components\Textarea::make('google_tag_manager')
                                ->label('Google Tag Manager')
                                ->columnSpanFull(),
                            Forms\Components\Textarea::make('google_analytics')
                                ->label('Google Analytics')
                                ->columnSpanFull(),
                            Forms\Components\Textarea::make('facebook_pixel')
                                ->label('Facebook Pixel')
                                ->columnSpanFull(),
                            Forms\Components\Textarea::make('tiktok_pixel')
                                ->label('TikTok Pixel')
                                ->columnSpanFull(),
                            Forms\Components\Textarea::make('custom_css')
                                ->label('Özel CSS')
                                ->columnSpanFull(),
                            Forms\Components\Textarea::make('custom_js')
                                ->label('Özel JS')
                                ->columnSpanFull(),
                            Forms\Components\Toggle::make('maintenance_mode')
                                ->label('Bakım Modu Aktif mi?')
                                ->required(),
                            Forms\Components\Textarea::make('maintenance_message')
                                ->label('Bakım Mesajı')
                                ->columnSpanFull(),
                        ])
                        ->columnSpan(8),
                ])
                ->columns(12),
        ]);
}


    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('favicon')
                    ->searchable(),
                Tables\Columns\TextColumn::make('site_name')
                    ->searchable(),
                Tables\Columns\IconColumn::make('maintenance_mode')
                    ->boolean(),
               
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
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

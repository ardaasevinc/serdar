<?php


namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\ImageColumn;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationGroup = 'Yönetim';
    protected static ?string $navigationLabel = 'Kullanıcılar';
    protected static ?string $pluralModelLabel = 'Kullanıcılar';
    protected static ?string $modelLabel = 'Kullanıcı';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            FileUpload::make('profile_photo_path')
                ->label('Profil Fotoğrafı')
                ->disk('uploads')
                ->directory('profilephotos')
                ->visibility('public')
                ->image()
                ->imageEditor()
                ->previewable(true)
                ->columnSpanFull(),

            TextInput::make('name')->required()->label('Ad Soyad'),
            TextInput::make('email')->required()->email()->label('E-posta'),

            TextInput::make('password')
                ->label('Şifre')
                ->password()
                ->dehydrateStateUsing(fn ($state) => filled($state) ? bcrypt($state) : null)
                ->required(fn (string $context): bool => $context === 'create')
                ->same('passwordConfirmation')
                ->nullable(),

            TextInput::make('passwordConfirmation')
                ->label('Şifre Tekrar')
                ->password()
                ->required(fn (string $context): bool => $context === 'create')
                ->dehydrated(false),

            Toggle::make('is_admin')->label('Yönetici Yetkisi'),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            ImageColumn::make('profile_photo_path')
                ->disk('uploads')
                ->label('Fotoğraf')
                ->circular(),
            TextColumn::make('name')->label('Ad Soyad')->searchable(),
            TextColumn::make('email')->label('E-posta')->searchable(),
            BooleanColumn::make('is_admin')->label('Admin'),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}

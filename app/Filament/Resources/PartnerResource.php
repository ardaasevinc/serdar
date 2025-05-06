<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PartnerResource\Pages;
use App\Models\Partner;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;

class PartnerResource extends Resource
{
    protected static ?string $model = Partner::class;

    protected static ?string $pluralModelLabel = 'Partnerler';
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationLabel = 'Partnerler';
    protected static ?string $navigationGroup = 'İçerik Yönetimi';
    protected static ?string $modelLabel = 'Partner';

    public static function form(Forms\Form $form): Forms\Form
{
    return $form
        ->schema([
            Forms\Components\Grid::make(12)
                ->schema([
                    Forms\Components\Group::make([
                        Forms\Components\FileUpload::make('image')
                        ->disk('uploads')
                        ->label('Görsel')
                        ->directory('partners')
                        ->visibility('public')
                        ->imagePreviewHeight('250')
                            ->helperText('Görseller 122x23 çözünürlüğünde olmalıdır.'),
                    ])
                    ->columnSpan(4), // Resim 4 kolon

                    Forms\Components\Group::make([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('url')
                            ->url()
                            ->maxLength(255),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),
                    ])
                    ->columnSpan(8), // Diğer inputlar 8 kolon
                ]),
        ]);
}


    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                ImageColumn::make('image'),
                TextColumn::make('url')->limit(30)->url(fn($record) => $record->url),
                ToggleColumn::make('is_active'),
                TextColumn::make('created_at')->dateTime(),
            ])

            ->emptyStateIcon(asset('custom-empty.svg'))
            ->emptyStateHeading('Henüz bir iş ortağı eklenmemiş.')
            ->emptyStateDescription('Bu alana iş ortaklarınızın logosunu ekleyebilirsiniz.')


            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active Partners')
                    ->trueLabel('Active')
                    ->falseLabel('Inactive'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListPartners::route('/'),
            'create' => Pages\CreatePartner::route('/create'),
            'edit' => Pages\EditPartner::route('/{record}/edit'),
        ];
    }
}

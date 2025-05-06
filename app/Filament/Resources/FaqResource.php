<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FaqResource\Pages;
use App\Models\Faq;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;

class FaqResource extends Resource
{
    protected static ?string $model = Faq::class;
    protected static ?string $pluralModelLabel = 'S.S.S';
    protected static ?string $modelLabel = 'Sıkça Sorulan Soru';
    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';
    protected static ?string $navigationLabel = 'S.S.S İçeriği';
    protected static ?string $navigationGroup = 'İçerik Yönetimi';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\Grid::make(12)
                ->schema([
                    Forms\Components\Group::make([
                        TextInput::make('question')
                            ->label('Soru')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->columnSpan(6), // Soru alanı

                    Forms\Components\Group::make([
                        Toggle::make('is_published')
                            ->label('Yayınlandı mı?')
                            ->default(true),
                    ])
                    ->columnSpan(6), // Yayınlama

                    Forms\Components\Group::make([
                        Textarea::make('answer')
                            ->label('Cevap')
                            ->required()
                            ->rows(6),
                    ])
                    ->columnSpan(12), // Alt kısım: Cevap
                ]),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            TextColumn::make('question')
                ->label('Soru')
                ->searchable()
                ->sortable(),

            BooleanColumn::make('is_published')
                ->label('Yayınlandı mı?')
                ->sortable(),

            TextColumn::make('created_at')
                ->dateTime('d.m.Y H:i')
                ->label('Oluşturulma'),
        ])
        ->filters([])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->emptyStateIcon(asset('custom-empty.svg'))
        ->emptyStateHeading('Henüz bir S.S.S eklenmemiş.')
        ->emptyStateDescription('Buradan sık sorulan soruları tanımlayabilirsin.')
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFaqs::route('/'),
            'create' => Pages\CreateFaq::route('/create'),
            'edit' => Pages\EditFaq::route('/{record}/edit'),
        ];
    }
}

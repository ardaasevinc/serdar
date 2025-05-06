<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Illuminate\Support\Str;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Placeholder;


class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationGroup = 'İçerik Yönetimi';
    protected static ?string $pluralModelLabel = 'Sayfalar';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Sayfalar';
    protected static ?string $modelLabel = 'Sayfa';
    protected static ?int $navigationSort = 1;

    public static function form(Forms\Form $form): Forms\Form
    {



        return $form->schema([
           
            Placeholder::make('info')
                ->label('')
                ->content(' **Sayfa oluştururken dikkat edilmesi gerekenler:** 
                -Önce Menü de gözükecek ana menüyü oluşturmalısınız. 
- Alt menü seçersen mutlaka bir ana menü bağlamayı unutma.  
- Slug alanı otomatik olarak başlığa göre oluşturulur.  
- Yayınlanmayan sayfalar sitede görünmez.')


                ->columnSpan('full')                
                ->extraAttributes(['class' => 'text-gray-500 text-sm']),


            TextInput::make('title')
                ->label('Başlık')
                ->required()
                ->live(onBlur: true)
                ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state))),

            TextInput::make('slug')
                ->label('Slug')
                ->disabled()
                ->dehydrated(),

            Select::make('type')
                ->label('Sayfa Tipi')
                ->options([
                    'menu' => 'Menü (Ana seviye)',
                    'submenu' => 'Alt Menü (Bir menüye bağlı)',
                    'home' => 'Ana Sayfa',
                    'footer' => 'Alt Bilgi (Footer alanı)',
                ])
                ->required()
                ->reactive(),

            Select::make('parent_menu_id')
                ->label('Bağlı Olduğu Menü')
                ->options(fn() => Page::where('type', 'menu')->pluck('title', 'id')->toArray())
                ->nullable()
                ->visible(fn($get) => $get('type') === 'submenu'),

            Toggle::make('is_published')
                ->label('Yayınlandı mı?')
                ->default(true),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->emptyStateIcon(asset('custom-empty.svg'))
            ->emptyStateHeading('Henüz bir sayfa eklenmemiş.')
            ->emptyStateDescription('Bu alanda eklediğiniz sayfaları listeleyebilirsiniz.')
            ->columns([
                TextColumn::make('title')
                    ->label('Başlık')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('type')
                    ->label('Sayfa Tipi')
                    ->sortable(),

                IconColumn::make('is_published')
                    ->label('Durum')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\SuperiorityFeatureResource\Pages;
use App\Models\SuperiorityFeature;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SuperiorityFeatureResource extends Resource
{
    protected static ?string $model = SuperiorityFeature::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';

    protected static ?string $navigationGroup = 'Konten Website';

    protected static ?string $navigationLabel = 'Fitur Unggulan';

    protected static ?string $pluralLabel = 'Fitur Unggulan';

    protected static ?string $slug = 'fitur-unggulan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Konten')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi')
                            ->required()
                            ->rows(3)
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('icon')
                            ->label('Ikon (Font Awesome)')
                            ->maxLength(255)
                            ->helperText('Contoh: fas fa-graduation-cap, fas fa-trophy, fas fa-flask'),
                        Forms\Components\FileUpload::make('image')
                            ->label('Gambar')
                            ->image()
                            ->directory('superiority-features'),
                        Forms\Components\Select::make('color')
                            ->label('Warna')
                            ->options([
                                'blue' => 'Biru',
                                'green' => 'Hijau',
                                'yellow' => 'Kuning',
                                'red' => 'Merah',
                                'purple' => 'Ungu',
                                'indigo' => 'Indigo',
                                'pink' => 'Pink',
                                'orange' => 'Oranye',
                                'teal' => 'Teal',
                                'cyan' => 'Cyan',
                            ])
                            ->default('blue'),
                    ]),
                Forms\Components\Section::make('Pengaturan')
                    ->schema([
                        Forms\Components\TextInput::make('sort_order')
                            ->label('Urutan')
                            ->numeric()
                            ->default(0),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order', 'asc')
            ->columns([
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->numeric()
                    ->sortable()
                    ->width(80),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->limit(40),
                Tables\Columns\TextColumn::make('icon')
                    ->label('Ikon')
                    ->icon(fn (string $state): string => $state)
                    ->width(80),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar')
                    ->square()
                    ->size(50),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Aktif'),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSuperiorityFeatures::route('/'),
        ];
    }
}

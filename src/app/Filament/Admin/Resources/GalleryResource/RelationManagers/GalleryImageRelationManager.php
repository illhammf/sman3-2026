<?php

namespace App\Filament\Admin\Resources\GalleryResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class GalleryImageRelationManager extends RelationManager
{
    protected static string $relationship = 'images';

    protected static ?string $title = 'Foto Galeri';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('image')
                    ->label('Foto')
                    ->image()
                    ->required()
                    ->directory('galleries')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('caption')
                    ->label('Keterangan')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('sort_order')
                    ->label('Urutan')
                    ->numeric()
                    ->default(0),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('image')
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Foto')
                    ->width(100),
                Tables\Columns\TextColumn::make('caption')
                    ->label('Keterangan')
                    ->limit(50),
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->numeric()
                    ->sortable(),
            ])
            ->defaultSort('sort_order')
            ->filters([])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Tambah Foto'),
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
}

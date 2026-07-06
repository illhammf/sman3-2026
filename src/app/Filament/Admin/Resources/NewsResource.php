<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\NewsResource\Pages;
use App\Filament\Admin\Resources\NewsResource\RelationManagers;
use App\Models\News;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationGroup = 'Konten Website';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Judul')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->helperText('Biarkan kosong untuk generate otomatis'),
                Forms\Components\Select::make('news_category_id')
                    ->label('Kategori Berita')
                    ->relationship('category', 'name')
                    ->required(),
                Forms\Components\FileUpload::make('featured_image')
                    ->label('Gambar Unggulan')
                    ->image()
                    ->directory('news'),
                Forms\Components\RichEditor::make('content')
                    ->label('Konten')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('excerpt')
                    ->label('Ringkasan')
                    ->columnSpanFull()
                    ->helperText('Ringkasan berita'),
                Forms\Components\TextInput::make('author')
                    ->label('Penulis')
                    ->maxLength(255),
                Forms\Components\Toggle::make('is_published')
                    ->label('Dipublikasikan'),
                Forms\Components\DateTimePicker::make('published_at')
                    ->label('Tanggal Publikasi'),
                Forms\Components\Toggle::make('is_featured')
                    ->label('Berita Unggulan'),
                Forms\Components\TextInput::make('meta_title')
                    ->label('Meta Title')
                    ->maxLength(255),
                Forms\Components\Textarea::make('meta_description')
                    ->label('Meta Description')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('published_at', 'desc')
            ->columns([
                Tables\Columns\ImageColumn::make('featured_image')
                    ->label('Gambar')
                    ->circular(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Kategori')
                    ->badge(),
                Tables\Columns\TextColumn::make('author')
                    ->label('Penulis')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_published')
                    ->label('Dipublikasikan')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Unggulan')
                    ->boolean(),
                Tables\Columns\TextColumn::make('published_at')
                    ->label('Tanggal Publikasi')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('news_category_id')
                    ->label('Kategori')
                    ->relationship('category', 'name'),
                Tables\Filters\Filter::make('is_published')
                    ->label('Dipublikasikan')
                    ->query(fn (Builder $query): Builder => $query->where('is_published', true)),
                Tables\Filters\Filter::make('is_featured')
                    ->label('Unggulan')
                    ->query(fn (Builder $query): Builder => $query->where('is_featured', true)),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}

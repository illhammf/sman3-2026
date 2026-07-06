<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PageResource\Pages;
use App\Filament\Admin\Resources\PageResource\RelationManagers;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Konten Website';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Judul')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),
                Forms\Components\TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255)
                    ->helperText('Biarkan kosong untuk generate otomatis'),
                Forms\Components\RichEditor::make('content')
                    ->label('Konten')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('excerpt')
                    ->label('Ringkasan')
                    ->columnSpanFull()
                    ->helperText('Ringkasan konten'),
                Forms\Components\FileUpload::make('featured_image')
                    ->label('Gambar Unggulan')
                    ->image()
                    ->directory('pages'),
                Forms\Components\Select::make('template')
                    ->label('Template')
                    ->options([
                        'default' => 'Default',
                        'full_width' => 'Full Width',
                        'with_sidebar' => 'Dengan Sidebar',
                    ])
                    ->default('default')
                    ->required(),
                Forms\Components\Toggle::make('is_published')
                    ->label('Dipublikasikan'),
                Forms\Components\DateTimePicker::make('published_at')
                    ->label('Tanggal Publikasi'),
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
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable()
                    ->limit(30),
                Tables\Columns\TextColumn::make('template')
                    ->label('Template')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'default' => 'Default',
                        'full_width' => 'Full Width',
                        'with_sidebar' => 'Dengan Sidebar',
                        default => $state,
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'default' => 'gray',
                        'full_width' => 'info',
                        'with_sidebar' => 'warning',
                        default => 'gray',
                    }),
                Tables\Columns\IconColumn::make('is_published')
                    ->label('Dipublikasikan')
                    ->boolean(),
                Tables\Columns\TextColumn::make('published_at')
                    ->label('Tanggal Publikasi')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('template')
                    ->label('Template')
                    ->options([
                        'default' => 'Default',
                        'full_width' => 'Full Width',
                        'with_sidebar' => 'Dengan Sidebar',
                    ]),
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Dipublikasikan'),
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
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}

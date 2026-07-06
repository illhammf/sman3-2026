<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\AcademicEventResource\Pages;
use App\Filament\Admin\Resources\AcademicEventResource\RelationManagers;
use App\Models\AcademicEvent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AcademicEventResource extends Resource
{
    protected static ?string $model = AcademicEvent::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $navigationGroup = 'Manajemen Sekolah';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Judul')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->label('Deskripsi')
                    ->columnSpanFull(),
                Forms\Components\DatePicker::make('start_date')
                    ->label('Tanggal Mulai')
                    ->required(),
                Forms\Components\DatePicker::make('end_date')
                    ->label('Tanggal Selesai')
                    ->nullable(),
                Forms\Components\Select::make('type')
                    ->label('Tipe')
                    ->options([
                        'academic' => 'Akademik',
                        'holiday' => 'Libur',
                        'exam' => 'Ujian',
                        'activity' => 'Kegiatan',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('color')
                    ->label('Warna')
                    ->maxLength(255)
                    ->helperText('Kode hex warna, contoh: #FF5733'),
                Forms\Components\Toggle::make('is_published')
                    ->label('Dipublikasikan'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->label('Tanggal Mulai')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->label('Tanggal Selesai')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('type')
                    ->label('Tipe')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'academic' => 'Akademik',
                        'holiday' => 'Libur',
                        'exam' => 'Ujian',
                        'activity' => 'Kegiatan',
                        default => $state,
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'academic' => 'info',
                        'holiday' => 'success',
                        'exam' => 'warning',
                        'activity' => 'primary',
                        default => 'gray',
                    }),
                Tables\Columns\ColorColumn::make('color')
                    ->label('Warna'),
                Tables\Columns\IconColumn::make('is_published')
                    ->label('Dipublikasikan')
                    ->boolean(),
            ])
            ->filters([
                //
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
            'index' => Pages\ListAcademicEvents::route('/'),
            'create' => Pages\CreateAcademicEvent::route('/create'),
            'edit' => Pages\EditAcademicEvent::route('/{record}/edit'),
        ];
    }
}

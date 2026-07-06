<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\AchievementResource\Pages;
use App\Filament\Admin\Resources\AchievementResource\RelationManagers;
use App\Models\Achievement;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AchievementResource extends Resource
{
    protected static ?string $model = Achievement::class;

    protected static ?string $navigationIcon = 'heroicon-o-trophy';

    protected static ?string $navigationGroup = 'Konten Website';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Judul')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('type')
                    ->label('Tipe')
                    ->options([
                        'student' => 'Siswa',
                        'teacher' => 'Guru',
                        'school' => 'Sekolah',
                    ])
                    ->required()
                    ->default('student'),
                Forms\Components\TextInput::make('achieved_by')
                    ->label('Pencapaian diraih oleh')
                    ->maxLength(255),
                Forms\Components\TextInput::make('scope')
                    ->label('Tingkat')
                    ->placeholder('Kabupaten/Provinsi/Nasional')
                    ->maxLength(255),
                Forms\Components\DatePicker::make('achievement_date')
                    ->label('Tanggal Pencapaian'),
                Forms\Components\Textarea::make('description')
                    ->label('Deskripsi')
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('photo')
                    ->label('Foto')
                    ->image()
                    ->directory('achievements'),
                Forms\Components\Toggle::make('is_published')
                    ->label('Dipublikasikan'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('achievement_date', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('type')
                    ->label('Tipe')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'student' => 'Siswa',
                        'teacher' => 'Guru',
                        'school' => 'Sekolah',
                        default => $state,
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'student' => 'success',
                        'teacher' => 'info',
                        'school' => 'warning',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('achieved_by')
                    ->label('Diraih oleh')
                    ->searchable(),
                Tables\Columns\TextColumn::make('achievement_date')
                    ->label('Tanggal Pencapaian')
                    ->date()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_published')
                    ->label('Dipublikasikan')
                    ->boolean(),
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
                Tables\Filters\SelectFilter::make('type')
                    ->label('Tipe')
                    ->options([
                        'student' => 'Siswa',
                        'teacher' => 'Guru',
                        'school' => 'Sekolah',
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
            'index' => Pages\ListAchievements::route('/'),
            'create' => Pages\CreateAchievement::route('/create'),
            'edit' => Pages\EditAchievement::route('/{record}/edit'),
        ];
    }
}

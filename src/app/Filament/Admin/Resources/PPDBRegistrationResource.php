<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PPDBRegistrationResource\Pages;
use App\Filament\Admin\Resources\PPDBRegistrationResource\RelationManagers;
use App\Models\PPDBRegistration;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PPDBRegistrationResource extends Resource
{
    protected static ?string $model = PPDBRegistration::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationGroup = 'PPDB';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Data Pendaftar')
                    ->schema([
                        Forms\Components\TextInput::make('registration_number')
                            ->label('Nomor Pendaftaran')
                            ->disabled(),
                        Forms\Components\TextInput::make('full_name')
                            ->label('Nama Lengkap')
                            ->disabled(),
                        Forms\Components\TextInput::make('nickname')
                            ->label('Nama Panggilan')
                            ->disabled(),
                        Forms\Components\TextInput::make('place_of_birth')
                            ->label('Tempat Lahir')
                            ->disabled(),
                        Forms\Components\DatePicker::make('date_of_birth')
                            ->label('Tanggal Lahir')
                            ->disabled(),
                        Forms\Components\Select::make('gender')
                            ->label('Jenis Kelamin')
                            ->options([
                                'L' => 'Laki-laki',
                                'P' => 'Perempuan',
                            ])
                            ->disabled(),
                        Forms\Components\Textarea::make('address')
                            ->label('Alamat')
                            ->columnSpanFull()
                            ->disabled(),
                        Forms\Components\TextInput::make('rt_rw')
                            ->label('RT/RW')
                            ->disabled(),
                        Forms\Components\TextInput::make('village')
                            ->label('Kelurahan/Desa')
                            ->disabled(),
                        Forms\Components\TextInput::make('district')
                            ->label('Kecamatan')
                            ->disabled(),
                        Forms\Components\TextInput::make('city')
                            ->label('Kota/Kabupaten')
                            ->disabled(),
                        Forms\Components\TextInput::make('postal_code')
                            ->label('Kode Pos')
                            ->disabled(),
                        Forms\Components\TextInput::make('phone')
                            ->label('Nomor Telepon')
                            ->disabled(),
                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->disabled(),
                    ])
                    ->columns(2),
                Forms\Components\Section::make('Data Pendaftaran')
                    ->schema([
                        Forms\Components\DatePicker::make('registration_date')
                            ->label('Tanggal Pendaftaran')
                            ->disabled(),
                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->options([
                                'pending' => 'Menunggu Verifikasi',
                                'verified' => 'Terverifikasi',
                                'accepted' => 'Diterima',
                                'rejected' => 'Ditolak',
                            ])
                            ->native(false),
                        Forms\Components\Textarea::make('notes')
                            ->label('Catatan')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
                Forms\Components\Section::make('Asal Sekolah')
                    ->schema([
                        Forms\Components\TextInput::make('previous_school')
                            ->label('Sekolah Asal')
                            ->disabled(),
                        Forms\Components\Textarea::make('previous_school_address')
                            ->label('Alamat Sekolah Asal')
                            ->columnSpanFull()
                            ->disabled(),
                        Forms\Components\TextInput::make('nisn')
                            ->label('NISN')
                            ->disabled(),
                    ]),
                Forms\Components\Section::make('Data Ayah')
                    ->schema([
                        Forms\Components\TextInput::make('father_name')
                            ->label('Nama Ayah')
                            ->disabled(),
                        Forms\Components\TextInput::make('father_education')
                            ->label('Pendidikan Ayah')
                            ->disabled(),
                        Forms\Components\TextInput::make('father_occupation')
                            ->label('Pekerjaan Ayah')
                            ->disabled(),
                        Forms\Components\TextInput::make('father_phone')
                            ->label('Nomor Telepon Ayah')
                            ->disabled(),
                    ])
                    ->columns(2),
                Forms\Components\Section::make('Data Ibu')
                    ->schema([
                        Forms\Components\TextInput::make('mother_name')
                            ->label('Nama Ibu')
                            ->disabled(),
                        Forms\Components\TextInput::make('mother_education')
                            ->label('Pendidikan Ibu')
                            ->disabled(),
                        Forms\Components\TextInput::make('mother_occupation')
                            ->label('Pekerjaan Ibu')
                            ->disabled(),
                        Forms\Components\TextInput::make('mother_phone')
                            ->label('Nomor Telepon Ibu')
                            ->disabled(),
                    ])
                    ->columns(2),
                Forms\Components\Section::make('Data Wali')
                    ->schema([
                        Forms\Components\TextInput::make('guardian_name')
                            ->label('Nama Wali')
                            ->columnSpanFull()
                            ->disabled(),
                        Forms\Components\TextInput::make('guardian_education')
                            ->label('Pendidikan Wali')
                            ->disabled(),
                        Forms\Components\TextInput::make('guardian_occupation')
                            ->label('Pekerjaan Wali')
                            ->disabled(),
                        Forms\Components\TextInput::make('guardian_phone')
                            ->label('Nomor Telepon Wali')
                            ->disabled(),
                    ])
                    ->columns(2),
                Forms\Components\Section::make('Dokumen')
                    ->schema([
                        Forms\Components\FileUpload::make('birth_certificate')
                            ->label('Akta Kelahiran')
                            ->image()
                            ->disabled(),
                        Forms\Components\FileUpload::make('family_card')
                            ->label('Kartu Keluarga')
                            ->image()
                            ->disabled(),
                        Forms\Components\FileUpload::make('photo')
                            ->label('Foto')
                            ->image()
                            ->disabled(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('registration_number')
                    ->label('No. Pendaftaran')
                    ->searchable()
                    ->badge(),
                Tables\Columns\TextColumn::make('full_name')
                    ->label('Nama Lengkap')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gender')
                    ->label('Jenis Kelamin')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => $state === 'L' ? 'Laki-laki' : 'Perempuan'),
                Tables\Columns\TextColumn::make('previous_school')
                    ->label('Sekolah Asal'),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn (PPDBRegistration $record): string => $record->statusLabel())
                    ->color(fn (PPDBRegistration $record): string => $record->statusColor()),
                Tables\Columns\TextColumn::make('registration_date')
                    ->label('Tanggal Daftar')
                    ->date(),
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
                Tables\Filters\SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Menunggu Verifikasi',
                        'verified' => 'Terverifikasi',
                        'accepted' => 'Diterima',
                        'rejected' => 'Ditolak',
                    ]),
                Tables\Filters\SelectFilter::make('gender')
                    ->label('Jenis Kelamin')
                    ->options([
                        'L' => 'Laki-laki',
                        'P' => 'Perempuan',
                    ]),
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
            'index' => Pages\ListPPDBRegistrations::route('/'),
            'edit' => Pages\EditPPDBRegistration::route('/{record}/edit'),
        ];
    }
}

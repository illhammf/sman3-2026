<?php

namespace App\Filament\Admin\Resources\ExtracurricularResource\Pages;

use App\Filament\Admin\Resources\ExtracurricularResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditExtracurricular extends EditRecord
{
    protected static string $resource = ExtracurricularResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

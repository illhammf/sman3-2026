<?php

namespace App\Filament\Admin\Resources\ExtracurricularResource\Pages;

use App\Filament\Admin\Resources\ExtracurricularResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListExtracurriculars extends ListRecords
{
    protected static string $resource = ExtracurricularResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

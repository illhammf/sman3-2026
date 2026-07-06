<?php

namespace App\Filament\Admin\Resources\AcademicEventResource\Pages;

use App\Filament\Admin\Resources\AcademicEventResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAcademicEvents extends ListRecords
{
    protected static string $resource = AcademicEventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

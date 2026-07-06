<?php

namespace App\Filament\Admin\Resources\PPDBRegistrationResource\Pages;

use App\Filament\Admin\Resources\PPDBRegistrationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPPDBRegistrations extends ListRecords
{
    protected static string $resource = PPDBRegistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}

<?php

namespace App\Filament\Admin\Resources\SuperiorityFeatureResource\Pages;

use App\Filament\Admin\Resources\SuperiorityFeatureResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageSuperiorityFeatures extends ManageRecords
{
    protected static string $resource = SuperiorityFeatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

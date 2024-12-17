<?php

namespace App\Filament\Resources\VolcanoResource\Pages;

use App\Filament\Resources\VolcanoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVolcanoes extends ListRecords
{
    protected static string $resource = VolcanoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

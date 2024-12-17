<?php

namespace App\Filament\Resources\VolcanoResource\Pages;

use App\Filament\Resources\VolcanoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateVolcano extends CreateRecord
{
    protected static string $resource = VolcanoResource::class;

    protected function getRedirectUrl(): string
    {        
        return $this->getResource()::getUrl('index');
    }
}

<?php

namespace App\Filament\Resources\NationalHeroResource\Pages;

use App\Filament\Resources\NationalHeroResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateNationalHero extends CreateRecord
{
    protected static string $resource = NationalHeroResource::class;

    protected function getRedirectUrl(): string
    {        
        return $this->getResource()::getUrl('index');
    }
}

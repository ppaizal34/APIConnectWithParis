<?php

namespace App\Filament\Resources\NationalHeroResource\Pages;

use App\Filament\Resources\NationalHeroResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNationalHeroes extends ListRecords
{
    protected static string $resource = NationalHeroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

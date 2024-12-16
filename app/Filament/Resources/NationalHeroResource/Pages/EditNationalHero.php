<?php

namespace App\Filament\Resources\NationalHeroResource\Pages;

use App\Filament\Resources\NationalHeroResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNationalHero extends EditRecord
{
    protected static string $resource = NationalHeroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {        
        return $this->getResource()::getUrl('index');
    }
}

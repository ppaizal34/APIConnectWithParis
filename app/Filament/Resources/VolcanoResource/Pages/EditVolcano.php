<?php

namespace App\Filament\Resources\VolcanoResource\Pages;

use App\Filament\Resources\VolcanoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVolcano extends EditRecord
{
    protected static string $resource = VolcanoResource::class;

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

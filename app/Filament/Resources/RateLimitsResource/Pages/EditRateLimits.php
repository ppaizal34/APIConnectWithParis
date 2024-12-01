<?php

namespace App\Filament\Resources\RateLimitsResource\Pages;

use App\Filament\Resources\RateLimitsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRateLimits extends EditRecord
{
    protected static string $resource = RateLimitsResource::class;

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

<?php

namespace App\Filament\Resources\RateLimitsResource\Pages;

use App\Filament\Resources\RateLimitsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRateLimits extends CreateRecord
{
    protected static string $resource = RateLimitsResource::class;

    protected function getRedirectUrl(): string
    {        
        return $this->getResource()::getUrl('index');
    }
    
}

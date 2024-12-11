<?php

namespace App\Filament\Resources\RateLimitsResource\Pages;

use App\Filament\Resources\RateLimitsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRateLimits extends ListRecords
{
    protected static string $resource = RateLimitsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

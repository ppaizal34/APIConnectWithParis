<?php

namespace App\Filament\Resources\IslamicPrayerResource\Pages;

use App\Filament\Resources\IslamicPrayerResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateIslamicPrayer extends CreateRecord
{
    protected static string $resource = IslamicPrayerResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

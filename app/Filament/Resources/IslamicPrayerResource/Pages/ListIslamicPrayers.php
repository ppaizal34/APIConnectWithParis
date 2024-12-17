<?php

namespace App\Filament\Resources\IslamicPrayerResource\Pages;

use App\Filament\Resources\IslamicPrayerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIslamicPrayers extends ListRecords
{
    protected static string $resource = IslamicPrayerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

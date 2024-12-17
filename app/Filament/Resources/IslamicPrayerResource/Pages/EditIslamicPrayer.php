<?php

namespace App\Filament\Resources\IslamicPrayerResource\Pages;

use App\Filament\Resources\IslamicPrayerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIslamicPrayer extends EditRecord
{
    protected static string $resource = IslamicPrayerResource::class;

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

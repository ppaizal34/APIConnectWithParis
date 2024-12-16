<?php

namespace App\Filament\Resources\EmojiResource\Pages;

use App\Filament\Resources\EmojiResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEmoji extends CreateRecord
{
    protected static string $resource = EmojiResource::class;

    protected function getRedirectUrl(): string
    {        
        return $this->getResource()::getUrl('index');
    }
}

<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\StatsOverview;
use App\Filament\Widgets\StatsChart;
use App\Filament\Widgets\LatestUsers;
use App\Filament\Widgets\GeographicalUser;
use App\Filament\Widgets\NewUsers;

use Filament\Pages\Page;

class Stats extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.stats';

    protected function getHeaderWidgets(): array
    {
        return [
            StatsOverview::class,
            StatsChart::class,
            GeographicalUser::class,
            LatestUsers::class,
            NewUsers::class,
        ];
    }
}

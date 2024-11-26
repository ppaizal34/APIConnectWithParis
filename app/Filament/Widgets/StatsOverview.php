<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
    
    protected function getStats(): array
    {
        return [
            Stat::make('User', User::count())
                ->icon('heroicon-m-user')
                ->description('Total registered users in the system')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),

            Stat::make('All API Requests', User::sum('request_count'))
                ->icon('heroicon-m-chart-bar')
                ->description('Total API requests made by all users')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),

            Stat::make('Visits Per Day', 250)
                ->icon('heroicon-m-chart-bar')
                ->description('Average daily visits to the platform')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),

            Stat::make('Active Users Today', 100)
                ->icon('heroicon-m-user-group')
                ->description('Users currently active on the platform')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),

            Stat::make('Devices Used by Users', 'Desktop')
                ->icon('heroicon-m-computer-desktop')
                ->description('Most commonly used device type by users')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
        ];

        $this->getColumns();
    }

    protected function getColumns(): int
    {
        return 3;
    }
}

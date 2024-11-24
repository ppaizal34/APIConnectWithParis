<?php

namespace App\Filament\Resources;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;


class StatsResource extends BaseWidget
{

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected function getStats(): array
    {
        return [
            Stat::make('Total User', User::count())
                ->icon('heroicon-m-user')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make('Total Seluruh Request API', User::sum('request_count'))
                ->icon('heroicon-m-chart-bar')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make('Jumlah Kunjugan User Perhari', 250)
                ->icon('heroicon-m-chart-bar')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make('Pengguna Aktif Hari Ini', 100)
                ->icon('heroicon-m-user-group')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make('Device Yang Sering Digunakan Pengguna', 'Desktop')
                ->icon('heroicon-m-computer-desktop')
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

<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class StatsChart extends ChartWidget
{
    protected static ?string $heading = 'Chart User Register';
    protected static string $color = 'success';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'User Register',
                    'data' => [100, 200, 150, 400, 500],
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#9BD0F5',
                ],
            ],
            'labels' => ['2020', '2021', '2022', '2023', '2024'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}

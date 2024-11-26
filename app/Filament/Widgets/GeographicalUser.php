<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class GeographicalUser extends ChartWidget
{
    protected static ?string $heading = 'Geographical User';
 
    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'User Register',
                    'data' => [200, 100, 30, 50, 20],
                    'backgroundColor' => [
                        'rgb(255, 99, 132)',  // Warna untuk Indonesia
                        'rgb(54, 162, 235)',  // Warna untuk Malaysia
                        'rgb(255, 205, 86)',  // Warna untuk India
                        'rgb(75, 192, 192)',  // Warna untuk Kamboja
                        'rgb(153, 102, 255)', // Warna untuk Japan
                    ],
                ],
            ],
            'labels' => ['Indonesia', 'Malaysia', 'India', 'Kamboja', 'Japan'],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}

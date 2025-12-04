<?php

namespace App\Filament\Widgets;

use App\Models\BatchPenetasan;
use App\Models\MonitoringHarian;
use Filament\Widgets\ChartWidget;

class TelurStatusChartWidget extends ChartWidget
{
    protected ?string $heading = 'Status Telur (Menetas vs Tidak Menetas)';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $totalTelurDimasukkan = BatchPenetasan::sum('jumlah_telur');
        $totalTelurMenetas = MonitoringHarian::sum('jumlah_menetas');
        $totalTelurTidakMenetas = $totalTelurDimasukkan - $totalTelurMenetas;

        return [
            'datasets' => [
                [
                    'label' => 'Status Telur',
                    'data' => [$totalTelurMenetas, $totalTelurTidakMenetas],
                    'backgroundColor' => [
                        'rgb(34, 197, 94)',
                        'rgb(239, 68, 68)',
                    ],
                ],
            ],
            'labels' => ['Menetas', 'Tidak Menetas'],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}

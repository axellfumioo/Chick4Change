<?php

namespace App\Filament\Widgets;

use App\Models\BatchPenetasan;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class JenisTelurChartWidget extends ChartWidget
{
    protected ?string $heading = 'Distribusi Jenis Telur';

    protected static ?int $sort = 1;

    protected function getData(): array
    {
        $data = BatchPenetasan::select('jenis_telur', DB::raw('SUM(jumlah_telur) as total'))
            ->groupBy('jenis_telur')
            ->get();

        $labels = [
            'AYAM_KAMPUNG' => 'Ayam Kampung',
            'BROILER' => 'Broiler',
            'BEBEK' => 'Bebek',
            'ENTOK' => 'Entok',
            'PUYUH' => 'Puyuh',
        ];

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Telur',
                    'data' => $data->pluck('total')->toArray(),
                    'backgroundColor' => [
                        'rgb(59, 130, 246)',
                        'rgb(139, 92, 246)',
                        'rgb(236, 72, 153)',
                        'rgb(249, 115, 22)',
                        'rgb(34, 197, 94)',
                    ],
                ],
            ],
            'labels' => $data->map(fn($item) => $labels[$item->jenis_telur] ?? $item->jenis_telur)->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}

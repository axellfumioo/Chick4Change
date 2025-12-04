<?php

namespace App\Filament\Widgets;

use App\Models\BatchPenetasan;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class PenetasanChartWidget extends ChartWidget
{
    protected ?string $heading = 'Grafik Penetasan per Bulan';

    protected static ?int $sort = 4;

    protected function getData(): array
    {
        $data = BatchPenetasan::select(
            DB::raw('DATE_FORMAT(tanggal_penetasan, "%Y-%m") as bulan'),
            DB::raw('COUNT(*) as total')
        )
            ->where('tanggal_penetasan', '>=', now()->subMonths(6))
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Batch',
                    'data' => $data->pluck('total')->toArray(),
                    'backgroundColor' => 'rgba(59, 130, 246, 0.1)',
                    'borderColor' => 'rgb(59, 130, 246)',
                    'fill' => true,
                ],
            ],
            'labels' => $data->pluck('bulan')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}

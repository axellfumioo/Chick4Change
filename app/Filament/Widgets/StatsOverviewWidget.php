<?php

namespace App\Filament\Widgets;

use App\Models\BatchPenetasan;
use App\Models\MonitoringHarian;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected function getStats(): array
    {
        // Hitung total batch
        $totalBatch = BatchPenetasan::count();

        // Hitung total telur yang dimasukkan
        $totalTelurDimasukkan = BatchPenetasan::sum('jumlah_telur');

        // Hitung total telur yang menetas
        $totalTelurMenetas = MonitoringHarian::sum('jumlah_menetas');

        // Hitung total telur tidak menetas
        $totalTelurTidakMenetas = $totalTelurDimasukkan - $totalTelurMenetas;

        // Hitung persentase keberhasilan
        $persentaseKeberhasilan = $totalTelurDimasukkan > 0
            ? round(($totalTelurMenetas / $totalTelurDimasukkan) * 100, 1)
            : 0;

        return [
            Stat::make('Total Batch', $totalBatch)
                ->description('Total batch penetasan')
                ->descriptionIcon('heroicon-m-rectangle-stack')
                ->color('primary'),

            Stat::make('Total Telur Dimasukkan', number_format($totalTelurDimasukkan))
                ->description('Jumlah telur yang dimasukkan mesin')
                ->descriptionIcon('heroicon-m-inbox-arrow-down')
                ->color('info'),

            Stat::make('Telur Menetas', number_format($totalTelurMenetas))
                ->description("Tingkat keberhasilan: {$persentaseKeberhasilan}%")
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),

            Stat::make('Telur Tidak Menetas', number_format($totalTelurTidakMenetas))
                ->description('Telur gagal menetas')
                ->descriptionIcon('heroicon-m-x-circle')
                ->color('danger'),
        ];
    }
}

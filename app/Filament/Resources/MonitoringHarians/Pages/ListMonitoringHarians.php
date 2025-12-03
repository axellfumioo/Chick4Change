<?php

namespace App\Filament\Resources\MonitoringHarians\Pages;

use App\Filament\Resources\MonitoringHarians\MonitoringHarianResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMonitoringHarians extends ListRecords
{
    protected static string $resource = MonitoringHarianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

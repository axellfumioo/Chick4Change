<?php

namespace App\Filament\Resources\MonitoringHarians\Pages;

use App\Filament\Resources\MonitoringHarians\MonitoringHarianResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMonitoringHarian extends EditRecord
{
    protected static string $resource = MonitoringHarianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\BatchPenetasans\Pages;

use App\Filament\Resources\BatchPenetasans\BatchPenetasanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBatchPenetasans extends ListRecords
{
    protected static string $resource = BatchPenetasanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\BatchPenetasans\Pages;

use App\Filament\Resources\BatchPenetasans\BatchPenetasanResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBatchPenetasan extends EditRecord
{
    protected static string $resource = BatchPenetasanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

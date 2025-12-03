<?php

namespace App\Filament\Resources\MonitoringHarians;

use App\Filament\Resources\MonitoringHarians\Pages\CreateMonitoringHarian;
use App\Filament\Resources\MonitoringHarians\Pages\EditMonitoringHarian;
use App\Filament\Resources\MonitoringHarians\Pages\ListMonitoringHarians;
use App\Filament\Resources\MonitoringHarians\Schemas\MonitoringHarianForm;
use App\Filament\Resources\MonitoringHarians\Tables\MonitoringHariansTable;
use App\Models\MonitoringHarian;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MonitoringHarianResource extends Resource
{
    protected static ?string $model = MonitoringHarian::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::PencilSquare;

    protected static ?string $recordTitleAttribute = 'Monitoring Harian';
    protected static ?string $title = 'Monitoring Harian';
    protected static ?string $label = 'Monitoring Harian';
    protected static ?string $pluralLabel = 'Monitoring Harian';
    protected static ?string $navigationLabel = 'Monitoring Harian';

    public static function form(Schema $schema): Schema
    {
        return MonitoringHarianForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MonitoringHariansTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMonitoringHarians::route('/'),
            'create' => CreateMonitoringHarian::route('/create'),
            'edit' => EditMonitoringHarian::route('/{record}/edit'),
        ];
    }
}

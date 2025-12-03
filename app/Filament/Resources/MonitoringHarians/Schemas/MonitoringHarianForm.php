<?php

namespace App\Filament\Resources\MonitoringHarians\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class MonitoringHarianForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                DateTimePicker::make('tanggal')
                    ->required(),
                TextInput::make('suhu')
                    ->required()
                    ->label('Suhu (°C)')
                    ->numeric(),
                TextInput::make('kelembapan')
                    ->required()
                    ->numeric(),
                Select::make('status_pembalikan_telur')
                    ->options([
                        'NORMAL' => 'Normal',
                        'MANUAL' => 'Manual',
                        'MACET' => 'Macet',
                        'TIDAK_DIBALIK' => 'Tidak  dibalik',
                    ])
                    ->required()
                    ->label('Status Pembalik Telur'),
                Select::make('kondisi_mesin')
                    ->options([
                        'NORMAL' => 'Normal',
                        'PANAS_BERLEBIH' => 'Panas berlebih',
                        'KELEMBAPAN_TURUN' => 'Kelembapan turun',
                        'MOTOR_PEMBALIK_MACET' => 'Motor pembalik macet',
                        'WADAH_AIR_KERING' => 'Wadah air kering',
                    ])
                    ->label('Kondisi Mesin')
                    ->required(),
                TextInput::make('jumlah_menetas')
                    ->required()
                    ->label('Jumlah Menetas')
                    ->numeric(),
                Textarea::make('catatan')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}

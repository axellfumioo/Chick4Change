<?php

namespace App\Filament\Resources\BatchPenetasans\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class BatchPenetasanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kode_batch')
                    ->required()
                    ->label("Kode Batch")
                    ->columnSpanFull(),
                Select::make('jenis_telur')
                    ->options([
            'AYAM_KAMPUNG' => 'Ayam  kampung',
            'BROILER' => 'Broiler',
            'BEBEK' => 'Bebek',
            'ENTOK' => 'Entok',
            'PUYUH' => 'Puyuh',
        ])
                    ->label("Jenis Telur")
                    ->required(),
                DateTimePicker::make('tanggal_penetasan')
                    ->label("Tanggal Penetasan")
                    ->required(),
                TextInput::make('jumlah_telur')
                    ->tel()
                    ->label("Jumlah Telur")
                    ->required()
                    ->numeric(),
                Select::make('lama_inkubasi')
                    ->options([22 => '22', 29 => '29', 36 => '36', 18 => '18'])
                    ->default('22')
                    ->label("Lama Inkubasi")
                    ->required(),
                TextInput::make('sumber_telur')
                    ->required()
                    ->label("Sumber Telur")
                    ->columnSpanFull(),
                TextInput::make('id_mesin_penetas')
                    ->required()
                    ->label("ID Mesin Penetas")
                    ->columnSpanFull(),
                Textarea::make('catatan')
                    ->required()
                    ->label("Catatan")
                    ->columnSpanFull(),
            ]);
    }
}

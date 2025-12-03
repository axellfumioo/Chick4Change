<?php

namespace App\Filament\Resources\BatchPenetasans;

use App\Filament\Resources\BatchPenetasans\Pages\CreateBatchPenetasan;
use App\Filament\Resources\BatchPenetasans\Pages\EditBatchPenetasan;
use App\Filament\Resources\BatchPenetasans\Pages\ListBatchPenetasans;
use App\Filament\Resources\BatchPenetasans\Schemas\BatchPenetasanForm;
use App\Filament\Resources\BatchPenetasans\Tables\BatchPenetasansTable;
use App\Models\BatchPenetasan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BatchPenetasanResource extends Resource
{
    protected static ?string $model = BatchPenetasan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Inbox;

    protected static ?string $recordTitleAttribute = 'Batch Penetasan';
    protected static ?string $title = 'Batch Penetasan';
    protected static ?string $label = 'Batch Penetasan';
    protected static ?string $pluralLabel = 'Batch Penetasan';
    protected static ?string $navigationLabel = 'Batch Penetasan';

    public static function form(Schema $schema): Schema
    {
        return BatchPenetasanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BatchPenetasansTable::configure($table);
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
            'index' => ListBatchPenetasans::route('/'),
            'create' => CreateBatchPenetasan::route('/create'),
            'edit' => EditBatchPenetasan::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources\PerangkatDesas;

use App\Filament\Resources\PerangkatDesas\Pages\CreatePerangkatDesa;
use App\Filament\Resources\PerangkatDesas\Pages\EditPerangkatDesa;
use App\Filament\Resources\PerangkatDesas\Pages\ListPerangkatDesas;
use App\Filament\Resources\PerangkatDesas\Schemas\PerangkatDesaForm;
use App\Filament\Resources\PerangkatDesas\Tables\PerangkatDesasTable;
use App\Models\PerangkatDesa;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PerangkatDesaResource extends Resource
{
    protected static ?string $model = PerangkatDesa::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama';

    protected static ?string $navigationLabel = 'Perangkat Desa';

    protected static ?string $modelLabel = 'Perangkat Desa';

    protected static ?string $pluralModelLabel = 'Perangkat Desa';

    protected static string|\UnitEnum|null $navigationGroup = 'Pemerintahan';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return PerangkatDesaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PerangkatDesasTable::configure($table);
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
            'index' => ListPerangkatDesas::route('/'),
            'create' => CreatePerangkatDesa::route('/create'),
            'edit' => EditPerangkatDesa::route('/{record}/edit'),
        ];
    }
}

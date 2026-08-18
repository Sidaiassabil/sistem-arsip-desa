<?php

namespace App\Filament\Resources\DokumenPembangunans;

use App\Filament\Resources\DokumenPembangunans\Pages\CreateDokumenPembangunan;
use App\Filament\Resources\DokumenPembangunans\Pages\EditDokumenPembangunan;
use App\Filament\Resources\DokumenPembangunans\Pages\ListDokumenPembangunans;
use App\Filament\Resources\DokumenPembangunans\Schemas\DokumenPembangunanForm;
use App\Filament\Resources\DokumenPembangunans\Tables\DokumenPembangunansTable;
use App\Models\DokumenPembangunan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DokumenPembangunanResource extends Resource
{
    protected static ?string $model = DokumenPembangunan::class;

    protected static string|BackedEnum|null $navigationIcon =
    Heroicon::OutlinedDocumentText;

    protected static ?string $recordTitleAttribute = 'nama_dokumen';

    protected static ?string $navigationLabel = 'Dokumen Pembangunan';

    protected static ?string $modelLabel = 'Dokumen Pembangunan';

    protected static ?string $pluralModelLabel = 'Dokumen Pembangunan';

    protected static string|\UnitEnum|null $navigationGroup = 'Pembangunan';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return DokumenPembangunanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DokumenPembangunansTable::configure($table);
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
            'index' => ListDokumenPembangunans::route('/'),
            'create' => CreateDokumenPembangunan::route('/create'),
            'edit' => EditDokumenPembangunan::route('/{record}/edit'),
        ];
    }
}

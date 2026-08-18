<?php

namespace App\Filament\Resources\DokumenKeuangans;

use App\Filament\Resources\DokumenKeuangans\Pages\CreateDokumenKeuangan;
use App\Filament\Resources\DokumenKeuangans\Pages\EditDokumenKeuangan;
use App\Filament\Resources\DokumenKeuangans\Pages\ListDokumenKeuangans;
use App\Filament\Resources\DokumenKeuangans\Schemas\DokumenKeuanganForm;
use App\Filament\Resources\DokumenKeuangans\Tables\DokumenKeuangansTable;
use App\Models\DokumenKeuangan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DokumenKeuanganResource extends Resource
{
    protected static ?string $model = DokumenKeuangan::class;

    protected static string|BackedEnum|null $navigationIcon =
    Heroicon::OutlinedDocumentText;

    protected static ?string $recordTitleAttribute = 'nama_dokumen';

    protected static ?string $navigationLabel = 'Dokumen Keuangan';

    protected static ?string $modelLabel = 'Dokumen Keuangan';

    protected static ?string $pluralModelLabel = 'Dokumen Keuangan';

    protected static string|\UnitEnum|null $navigationGroup = 'Keuangan';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return DokumenKeuanganForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DokumenKeuangansTable::configure($table);
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
            'index' => ListDokumenKeuangans::route('/'),
            'create' => CreateDokumenKeuangan::route('/create'),
            'edit' => EditDokumenKeuangan::route('/{record}/edit'),
        ];
    }
}

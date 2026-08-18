<?php

namespace App\Filament\Resources\KategoriArsips;

use App\Filament\Resources\KategoriArsips\Pages\CreateKategoriArsip;
use App\Filament\Resources\KategoriArsips\Pages\EditKategoriArsip;
use App\Filament\Resources\KategoriArsips\Pages\ListKategoriArsips;
use App\Filament\Resources\KategoriArsips\Schemas\KategoriArsipForm;
use App\Filament\Resources\KategoriArsips\Tables\KategoriArsipsTable;
use App\Models\KategoriArsip;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class KategoriArsipResource extends Resource
{
    protected static ?string $model = KategoriArsip::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama';

    protected static ?string $navigationLabel = 'Kategori Arsip';

    protected static ?string $modelLabel = 'Kategori Arsip';

    protected static ?string $pluralModelLabel = 'Kategori Arsip';

    protected static string|\UnitEnum|null $navigationGroup = 'Arsip';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return KategoriArsipForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KategoriArsipsTable::configure($table);
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
            'index' => ListKategoriArsips::route('/'),
            'create' => CreateKategoriArsip::route('/create'),
            'edit' => EditKategoriArsip::route('/{record}/edit'),
        ];
    }
}

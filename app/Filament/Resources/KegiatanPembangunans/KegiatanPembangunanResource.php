<?php

namespace App\Filament\Resources\KegiatanPembangunans;

use App\Filament\Resources\KegiatanPembangunans\Pages\CreateKegiatanPembangunan;
use App\Filament\Resources\KegiatanPembangunans\Pages\EditKegiatanPembangunan;
use App\Filament\Resources\KegiatanPembangunans\Pages\ListKegiatanPembangunans;
use App\Filament\Resources\KegiatanPembangunans\Schemas\KegiatanPembangunanForm;
use App\Filament\Resources\KegiatanPembangunans\Tables\KegiatanPembangunansTable;
use App\Models\KegiatanPembangunan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class KegiatanPembangunanResource extends Resource
{
    protected static ?string $model = KegiatanPembangunan::class;

protected static string|BackedEnum|null $navigationIcon =
    Heroicon::OutlinedRectangleStack;

protected static ?string $recordTitleAttribute = 'nama_kegiatan';

protected static ?string $navigationLabel = 'Kegiatan Pembangunan';

protected static ?string $modelLabel = 'Kegiatan Pembangunan';

protected static ?string $pluralModelLabel = 'Kegiatan Pembangunan';

protected static string|\UnitEnum|null $navigationGroup = 'Pembangunan';

protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return KegiatanPembangunanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KegiatanPembangunansTable::configure($table);
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
            'index' => ListKegiatanPembangunans::route('/'),
            'create' => CreateKegiatanPembangunan::route('/create'),
            'edit' => EditKegiatanPembangunan::route('/{record}/edit'),
        ];
    }
}
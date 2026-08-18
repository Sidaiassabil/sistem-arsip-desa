<?php

namespace App\Filament\Resources\SuratMasuks;

use App\Filament\Resources\SuratMasuks\Pages\CreateSuratMasuk;
use App\Filament\Resources\SuratMasuks\Pages\EditSuratMasuk;
use App\Filament\Resources\SuratMasuks\Pages\ListSampah;
use App\Filament\Resources\SuratMasuks\Pages\ListSuratMasuks;
use App\Filament\Resources\SuratMasuks\Schemas\SuratMasukForm;
use App\Filament\Resources\SuratMasuks\Tables\SuratMasuksTable;
use App\Models\SuratMasuk;
use BackedEnum;
use Filament\Navigation\NavigationItem;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SuratMasukResource extends Resource
{
    protected static ?string $model = SuratMasuk::class;

    protected static string|BackedEnum|null $navigationIcon =
        Heroicon::OutlinedInboxArrowDown;

    protected static ?string $recordTitleAttribute = 'perihal';

    protected static ?string $navigationLabel = 'Surat Masuk';

    protected static ?string $modelLabel = 'Surat Masuk';

    protected static ?string $pluralModelLabel = 'Surat Masuk';

    protected static string|\UnitEnum|null $navigationGroup = 'Surat';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return SuratMasukForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SuratMasuksTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getNavigationItems(): array
    {
        return [
            NavigationItem::make('Surat Masuk')
                ->icon('heroicon-o-inbox-arrow-down')
                ->group('Surat')
                ->sort(1)
                ->url(static::getUrl('index'))
                ->isActiveWhen(
                    fn (): bool => request()->routeIs(
                        'filament.admin.resources.surat-masuks.index'
                    )
                ),

            NavigationItem::make('Sampah Surat Masuk')
                ->icon('heroicon-o-trash')
                ->group('Surat')
                ->sort(2)
                ->url(static::getUrl('sampah'))
                ->isActiveWhen(
                    fn (): bool => request()->routeIs(
                        'filament.admin.resources.surat-masuks.sampah'
                    )
                ),
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSuratMasuks::route('/'),
            'create' => CreateSuratMasuk::route('/create'),
            'edit' => EditSuratMasuk::route('/{record}/edit'),
            'sampah' => ListSampah::route('/sampah'),
        ];
    }
}
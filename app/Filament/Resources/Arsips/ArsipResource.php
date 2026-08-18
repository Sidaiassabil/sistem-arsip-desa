<?php

namespace App\Filament\Resources\Arsips;

use App\Filament\Resources\Arsips\Pages\CreateArsip;
use App\Filament\Resources\Arsips\Pages\EditArsip;
use App\Filament\Resources\Arsips\Pages\ListArsips;
use App\Filament\Resources\Arsips\Pages\ListSampah;
use App\Filament\Resources\Arsips\Schemas\ArsipForm;
use App\Filament\Resources\Arsips\Tables\ArsipsTable;
use App\Models\Arsip;
use BackedEnum;
use Filament\Navigation\NavigationItem;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ArsipResource extends Resource
{
    protected static ?string $model = Arsip::class;

    protected static string|BackedEnum|null $navigationIcon =
        Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'judul';

    protected static ?string $navigationLabel = 'Arsip Dokumen';

    protected static ?string $modelLabel = 'Arsip Dokumen';

    protected static ?string $pluralModelLabel = 'Arsip Dokumen';

    protected static string|\UnitEnum|null $navigationGroup = 'Arsip';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return ArsipForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ArsipsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getNavigationItems(): array
    {
        return [
            NavigationItem::make('Arsip Dokumen')
                ->icon('heroicon-o-rectangle-stack')
                ->group('Arsip')
                ->sort(1)
                ->url(static::getUrl('index'))
                ->isActiveWhen(fn (): bool => request()->routeIs(
                    'filament.admin.resources.arsips.index'
                )),

            NavigationItem::make('Sampah')
                ->icon('heroicon-o-trash')
                ->group('Arsip')
                ->sort(3)
                ->url(static::getUrl('sampah'))
                ->isActiveWhen(fn (): bool => request()->routeIs(
                    'filament.admin.resources.arsips.sampah'
                )),
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListArsips::route('/'),
            'create' => CreateArsip::route('/create'),
            'edit' => EditArsip::route('/{record}/edit'),
            'sampah' => ListSampah::route('/sampah'),
        ];
    }
}
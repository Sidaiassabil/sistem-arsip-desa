<?php

namespace App\Filament\Resources\SuratKeluars;

use App\Filament\Resources\SuratKeluars\Pages\CreateSuratKeluar;
use App\Filament\Resources\SuratKeluars\Pages\EditSuratKeluar;
use App\Filament\Resources\SuratKeluars\Pages\ListSampah;
use App\Filament\Resources\SuratKeluars\Pages\ListSuratKeluars;
use App\Filament\Resources\SuratKeluars\Schemas\SuratKeluarForm;
use App\Filament\Resources\SuratKeluars\Tables\SuratKeluarsTable;
use App\Models\SuratKeluar;
use BackedEnum;
use Filament\Navigation\NavigationItem;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SuratKeluarResource extends Resource
{
    protected static ?string $model = SuratKeluar::class;

    protected static string|BackedEnum|null $navigationIcon =
        Heroicon::OutlinedPaperAirplane;

    protected static ?string $recordTitleAttribute = 'perihal';

    protected static ?string $navigationLabel = 'Surat Keluar';

    protected static ?string $modelLabel = 'Surat Keluar';

    protected static ?string $pluralModelLabel = 'Surat Keluar';

    protected static string|\UnitEnum|null $navigationGroup = 'Surat';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return SuratKeluarForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SuratKeluarsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getNavigationItems(): array
    {
        return [
            NavigationItem::make('Surat Keluar')
                ->icon('heroicon-o-paper-airplane')
                ->group('Surat')
                ->sort(2)
                ->url(static::getUrl('index'))
                ->isActiveWhen(
                    fn (): bool => request()->routeIs(
                        'filament.admin.resources.surat-keluars.index'
                    )
                ),

            NavigationItem::make('Sampah Surat Keluar')
                ->icon('heroicon-o-trash')
                ->group('Surat')
                ->sort(4)
                ->url(static::getUrl('sampah'))
                ->isActiveWhen(
                    fn (): bool => request()->routeIs(
                        'filament.admin.resources.surat-keluars.sampah'
                    )
                ),
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSuratKeluars::route('/'),
            'create' => CreateSuratKeluar::route('/create'),
            'edit' => EditSuratKeluar::route('/{record}/edit'),
            'sampah' => ListSampah::route('/sampah'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
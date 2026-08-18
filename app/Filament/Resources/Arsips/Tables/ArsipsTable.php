<?php

namespace App\Filament\Resources\Arsips\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ArsipsTable
{
    public static function configure(Table $table): Table
    {
        return $table

            /*
            |--------------------------------------------------------------------------
            | Kolom
            |--------------------------------------------------------------------------
            */

            ->columns([

                TextColumn::make('kode_arsip')
                    ->label('Kode Arsip')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->copyMessage('Kode arsip berhasil disalin')
                    ->copyMessageDuration(1500),

                TextColumn::make('nomor_dokumen')
                    ->label('Nomor Dokumen')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('judul')
                    ->label('Judul Dokumen')
                    ->searchable()
                    ->sortable()
                    ->limit(50)
                    ->tooltip(fn ($record) => $record->judul),

                TextColumn::make('kategoriArsip.nama')
                    ->label('Kategori')
                    ->badge()
                    ->sortable()
                    ->searchable(),

                TextColumn::make('tahun')
                    ->label('Tahun')
                    ->sortable()
                    ->alignCenter(),

                TextColumn::make('tanggal_dokumen')
                    ->label('Tanggal Dokumen')
                    ->date('d M Y')
                    ->sortable(),

                TextColumn::make('sumber')
                    ->label('Sumber')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'aktif' => 'success',
                        'nonaktif' => 'danger',
                        default => 'gray',
                    }),

                IconColumn::make('file')
                    ->label('File')
                    ->icon('heroicon-o-document')
                    ->color('primary')
                    ->tooltip('Dokumen tersedia'),

            ])

            /*
            |--------------------------------------------------------------------------
            | Filter
            |--------------------------------------------------------------------------
            */

            ->filters([

                SelectFilter::make('kategori_arsip_id')
                    ->label('Kategori')
                    ->relationship(
                        'kategoriArsip',
                        'nama'
                    )
                    ->searchable()
                    ->preload(),

                SelectFilter::make('tahun')
                    ->label('Tahun')
                    ->options(
                        collect(
                            range(
                                now()->year - 10,
                                now()->year + 1
                            )
                        )
                        ->mapWithKeys(
                            fn ($year) => [
                                $year => $year,
                            ]
                        )
                        ->toArray()
                    )
                    ->searchable(),

                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'aktif' => 'Aktif',
                        'nonaktif' => 'Nonaktif',
                    ]),

                Filter::make('tanggal_dokumen')
                    ->label('Tanggal Dokumen')
                    ->form([
                        \Filament\Forms\Components\DatePicker::make(
                            'dari'
                        )
                            ->label('Dari'),

                        \Filament\Forms\Components\DatePicker::make(
                            'sampai'
                        )
                            ->label('Sampai'),
                    ])
                    ->query(
                        function (
                            Builder $query,
                            array $data
                        ): Builder {

                            return $query

                                ->when(
                                    $data['dari'] ?? null,
                                    fn (
                                        Builder $query,
                                        $date
                                    ) => $query->whereDate(
                                        'tanggal_dokumen',
                                        '>=',
                                        $date
                                    )
                                )

                                ->when(
                                    $data['sampai'] ?? null,
                                    fn (
                                        Builder $query,
                                        $date
                                    ) => $query->whereDate(
                                        'tanggal_dokumen',
                                        '<=',
                                        $date
                                    )
                                    );
                        }
                    ),

            ])

            /*
            |--------------------------------------------------------------------------
            | Actions
            |--------------------------------------------------------------------------
            */

            ->recordActions([

                Action::make('preview')
                    ->label('Preview')
                    ->icon('heroicon-o-eye')
                    ->url(
                        fn ($record) =>
                        route(
                            'arsip.preview',
                            $record
                        )
                    )
                    ->openUrlInNewTab(),

                Action::make('download')
                    ->label('Download')
                    ->icon(
                        'heroicon-o-arrow-down-tray'
                    )
                    ->url(
                        fn ($record) =>
                        route(
                            'arsip.download',
                            $record
                        )
                    )
                    ->openUrlInNewTab(),

                EditAction::make(),

            ])

            /*
            |--------------------------------------------------------------------------
            | Bulk Actions
            |--------------------------------------------------------------------------
            */

            ->toolbarActions([

                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),

            ])

            /*
            |--------------------------------------------------------------------------
            | Default
            |--------------------------------------------------------------------------
            */

            ->defaultSort(
                'created_at',
                'desc'
            )

            ->striped();
    }
}
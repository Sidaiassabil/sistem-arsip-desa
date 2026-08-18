<?php

namespace App\Filament\Resources\SuratMasuks\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class SuratMasuksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('nomor_agenda')
                    ->label('No. Agenda')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->copyMessage('Nomor agenda berhasil disalin')
                    ->copyMessageDuration(1500),

                TextColumn::make('nomor_surat')
                    ->label('Nomor Surat')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('tanggal_surat')
                    ->label('Tanggal Surat')
                    ->date('d M Y')
                    ->sortable(),

                TextColumn::make('tanggal_diterima')
                    ->label('Diterima')
                    ->date('d M Y')
                    ->sortable(),

                TextColumn::make('asal_surat')
                    ->label('Asal Surat')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('perihal')
                    ->label('Perihal')
                    ->searchable()
                    ->sortable()
                    ->limit(45)
                    ->tooltip(
                        fn ($record) => $record->perihal
                    ),

                TextColumn::make('ditujukan_kepada')
                    ->label('Ditujukan Kepada')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(
                        fn (string $state): string => match ($state) {
                            'diterima' => 'info',
                            'diproses' => 'warning',
                            'didisposisi' => 'primary',
                            'selesai' => 'success',
                            default => 'gray',
                        }
                    ),

                IconColumn::make('file')
                    ->label('File')
                    ->icon('heroicon-o-document')
                    ->color('primary'),

            ])

            ->filters([

                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'diterima' => 'Diterima',
                        'diproses' => 'Diproses',
                        'didisposisi' => 'Didisposisi',
                        'selesai' => 'Selesai',
                    ]),

                Filter::make('tanggal_surat')
                    ->label('Tanggal Surat')
                    ->form([
                        DatePicker::make('dari')
                            ->label('Dari')
                            ->native(false),

                        DatePicker::make('sampai')
                            ->label('Sampai')
                            ->native(false),
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
                                        'tanggal_surat',
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
                                        'tanggal_surat',
                                        '<=',
                                        $date
                                    )
                                );
                        }
                    ),

                Filter::make('tanggal_diterima')
                    ->label('Tanggal Diterima')
                    ->form([
                        DatePicker::make('dari')
                            ->label('Dari')
                            ->native(false),

                        DatePicker::make('sampai')
                            ->label('Sampai')
                            ->native(false),
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
                                        'tanggal_diterima',
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
                                        'tanggal_diterima',
                                        '<=',
                                        $date
                                    )
                                );
                        }
                    ),

            ])

            ->recordActions([

                Action::make('preview')
                    ->label('Preview')
                    ->icon('heroicon-o-eye')
                    ->url(
                        fn ($record) => route(
                            'surat-masuk.preview',
                            $record
                        )
                    )
                    ->openUrlInNewTab(),

                Action::make('download')
                    ->label('Download')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->url(
                        fn ($record) => route(
                            'surat-masuk.download',
                            $record
                        )
                    )
                    ->openUrlInNewTab(),

                EditAction::make(),

            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])

            ->defaultSort(
                'tanggal_diterima',
                'desc'
            )

            ->striped();
    }
}
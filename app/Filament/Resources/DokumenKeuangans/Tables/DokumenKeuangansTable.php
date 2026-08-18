<?php

namespace App\Filament\Resources\DokumenKeuangans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DokumenKeuangansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('nama_dokumen')
                    ->label('Nama Dokumen')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('jenis_dokumen')
                    ->label('Jenis Dokumen')
                    ->badge()
                    ->color(
                        fn(string $state): string => match ($state) {
                            'APBDes' => 'primary',
                            'RAB' => 'info',
                            'SPJ' => 'warning',
                            'LPJ' => 'success',
                            'Laporan Keuangan' => 'success',
                            'Bukti Pengeluaran' => 'warning',
                            'Kwitansi' => 'gray',
                            'Berita Acara' => 'gray',
                            'Dokumen Lainnya' => 'gray',
                            default => 'gray',
                        }
                    ),

                TextColumn::make('tahun')
                    ->label('Tahun')
                    ->sortable(),

                TextColumn::make('nomor_dokumen')
                    ->label('Nomor Dokumen')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('tanggal_dokumen')
                    ->label('Tanggal Dokumen')
                    ->date('d M Y')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('sumber_dana')
                    ->label('Sumber Dana')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('file')
                    ->label('File')
                    ->formatStateUsing(
                        fn(?string $state): string =>
                        $state ? 'Lihat Dokumen' : '-'
                    )
                    ->url(
                        fn($record) =>
                        $record->file
                            ? route(
                                'dokumen-keuangan.preview',
                                $record
                            )
                            : null
                    )
                    ->openUrlInNewTab()
                    ->icon('heroicon-o-document-text')
                    ->color('primary'),

                TextColumn::make('created_at')
                    ->label('Ditambahkan')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])

            ->filters([

                \Filament\Tables\Filters\SelectFilter::make('jenis_dokumen')
                    ->label('Jenis Dokumen')
                    ->options([
                        'APBDes' => 'APBDes',
                        'RAB' => 'RAB',
                        'SPJ' => 'SPJ',
                        'LPJ' => 'LPJ',
                        'Laporan Keuangan' => 'Laporan Keuangan',
                        'Bukti Pengeluaran' => 'Bukti Pengeluaran',
                        'Kwitansi' => 'Kwitansi',
                        'Berita Acara' => 'Berita Acara',
                        'Dokumen Lainnya' => 'Dokumen Lainnya',
                    ]),

                \Filament\Tables\Filters\SelectFilter::make('tahun')
                    ->label('Tahun')
                    ->options(
                        fn(): array => \App\Models\DokumenKeuangan::query()
                            ->orderByDesc('tahun')
                            ->pluck('tahun', 'tahun')
                            ->toArray()
                    ),

            ])

            ->recordActions([
                EditAction::make(),
            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])

            ->defaultSort(
                'tahun',
                'desc'
            )

            ->striped();
    }
}

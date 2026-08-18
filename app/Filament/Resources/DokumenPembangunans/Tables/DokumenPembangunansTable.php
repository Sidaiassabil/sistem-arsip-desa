<?php

namespace App\Filament\Resources\DokumenPembangunans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DokumenPembangunansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('kegiatanPembangunan.nama_kegiatan')
                    ->label('Kegiatan Pembangunan')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('nama_dokumen')
                    ->label('Nama Dokumen')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('jenis_dokumen')
                    ->label('Jenis Dokumen')
                    ->badge()
                    ->color(
                        fn(string $state): string => match ($state) {
                            'RAB' => 'info',
                            'Proposal' => 'warning',
                            'SPK' => 'primary',
                            'Kontrak' => 'primary',
                            'Laporan' => 'success',
                            'Berita Acara' => 'gray',
                            'LPJ' => 'success',
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
                                'dokumen-pembangunan.preview',
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
                        'RAB' => 'RAB',
                        'Proposal' => 'Proposal',
                        'SPK' => 'SPK',
                        'Kontrak' => 'Kontrak',
                        'Laporan' => 'Laporan',
                        'Berita Acara' => 'Berita Acara',
                        'LPJ' => 'LPJ',
                        'Dokumen Lainnya' => 'Dokumen Lainnya',
                    ]),

                \Filament\Tables\Filters\SelectFilter::make('tahun')
                    ->label('Tahun')
                    ->options(
                        fn(): array => \App\Models\DokumenPembangunan::query()
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

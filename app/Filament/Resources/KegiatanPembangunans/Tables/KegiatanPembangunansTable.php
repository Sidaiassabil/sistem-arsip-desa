<?php

namespace App\Filament\Resources\KegiatanPembangunans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class KegiatanPembangunansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                ImageColumn::make('foto')
                    ->label('Foto')
                    ->disk('public')
                    ->circular(),

                TextColumn::make('nama_kegiatan')
                    ->label('Nama Kegiatan')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('lokasi')
                    ->label('Lokasi')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('tahun')
                    ->label('Tahun')
                    ->sortable(),

                TextColumn::make('anggaran')
                    ->label('Anggaran')
                    ->money('IDR')
                    ->sortable(),

                TextColumn::make('sumber_dana')
                    ->label('Sumber Dana')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('volume')
                    ->label('Volume')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('pelaksana')
                    ->label('Pelaksana')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('tanggal_mulai')
                    ->label('Mulai')
                    ->date('d M Y')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('tanggal_selesai')
                    ->label('Selesai')
                    ->date('d M Y')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(
                        fn(string $state): string => match ($state) {
                            'Perencanaan' => 'gray',
                            'Berjalan' => 'warning',
                            'Selesai' => 'success',
                            default => 'gray',
                        }
                    ),

                TextColumn::make('created_at')
                    ->label('Ditambahkan')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])

            ->filters([

                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'Perencanaan' => 'Perencanaan',
                        'Berjalan' => 'Berjalan',
                        'Selesai' => 'Selesai',
                    ]),

                SelectFilter::make('tahun')
                    ->label('Tahun')
                    ->options(
                        fn(): array => \App\Models\KegiatanPembangunan::query()
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
                fn($query) => $query
                    ->orderByRaw("
                    CASE status
                    WHEN 'Perencanaan' THEN 1
                    WHEN 'Berjalan' THEN 2
                    WHEN 'Selesai' THEN 3
                    ELSE 4
                    END
                ")
                    ->orderByDesc('tahun')
                    ->orderBy('nama_kegiatan')
            )

            ->striped();
    }
}

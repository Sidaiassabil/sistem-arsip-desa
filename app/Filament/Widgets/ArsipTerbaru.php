<?php

namespace App\Filament\Widgets;

use App\Models\Arsip;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class ArsipTerbaru extends TableWidget
{
    protected int|string|array $columnSpan = 'full';

    protected static ?string $heading = 'Arsip Terbaru';

    protected static ?int $sort = 4;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                fn(): Builder => Arsip::query()
                    ->with('kategoriArsip')
                    ->latest('created_at')
            )

            ->columns([

                TextColumn::make('kode_arsip')
                    ->label('Kode')
                    ->badge()
                    ->color('primary')
                    ->searchable(),

                TextColumn::make('judul')
                    ->label('Judul Dokumen')
                    ->searchable()
                    ->limit(45)
                    ->weight('medium'),

                TextColumn::make('kategoriArsip.nama')
                    ->label('Kategori')
                    ->badge()
                    ->color('gray'),

                TextColumn::make('tahun')
                    ->label('Tahun')
                    ->sortable(),

                TextColumn::make('tanggal_dokumen')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Ditambahkan')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->since(),

            ])

            ->defaultSort('created_at', 'desc')

            ->paginated([5, 10, 25])

            ->defaultPaginationPageOption(5)

            ->striped();
    }
}
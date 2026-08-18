<?php

namespace App\Filament\Resources\LogAktivitas\Tables;

use App\Models\LogAktivitas;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class LogAktivitasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('user.name')
                    ->label('Pengguna')
                    ->searchable()
                    ->sortable()
                    ->placeholder('-'),

                TextColumn::make('aktivitas')
                    ->label('Aktivitas')
                    ->badge()
                    ->color(
                        fn(string $state): string => match ($state) {
                            'Menambahkan' => 'success',
                            'Mengubah' => 'warning',
                            'Menghapus' => 'danger',
                            default => 'gray',
                        }
                    )
                    ->searchable()
                    ->sortable(),

                TextColumn::make('modul')
                    ->label('Modul')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(50)
                    ->tooltip(
                        fn(?string $state): ?string => $state
                    ),

                TextColumn::make('ip_address')
                    ->label('IP Address')
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->label('Waktu')
                    ->dateTime('d M Y H:i:s')
                    ->sortable(),

            ])

            ->filters([

                SelectFilter::make('aktivitas')
                    ->label('Aktivitas')
                    ->options([
                        'Menambahkan' => 'Menambahkan',
                        'Mengubah' => 'Mengubah',
                        'Menghapus' => 'Menghapus',
                    ]),

                SelectFilter::make('modul')
                    ->label('Modul')
                    ->options(
                        fn(): array => LogAktivitas::query()
                            ->whereNotNull('modul')
                            ->distinct()
                            ->orderBy('modul')
                            ->pluck('modul', 'modul')
                            ->toArray()
                    ),

                Filter::make('created_at')
                    ->schema([
                        \Filament\Forms\Components\DatePicker::make('tanggal')
                            ->label('Tanggal'),
                    ])
                    ->query(
                        fn(
                            Builder $query,
                            array $data
                        ): Builder => $query->when(
                            $data['tanggal'] ?? null,
                            fn(Builder $query, $date) =>
                                $query->whereDate(
                                    'created_at',
                                    $date
                                )
                        )
                    ),

            ])

            ->recordActions([])

            ->toolbarActions([])

            ->defaultSort(
                'created_at',
                'desc'
            )

            ->striped();
    }
}
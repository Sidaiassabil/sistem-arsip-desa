<?php

namespace App\Filament\Widgets;

use App\Models\LogAktivitas;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class AktivitasTerbaru extends TableWidget
{
    protected int|string|array $columnSpan = 'full';

    protected static ?string $heading = 'Aktivitas Terbaru';

    protected static ?int $sort = 5;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                fn(): Builder => LogAktivitas::query()
                    ->with('user')
                    ->latest('created_at')
            )

            ->columns([

                TextColumn::make('user.name')
                    ->label('Pengguna')
                    ->searchable()
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
                    ),

                TextColumn::make('modul')
                    ->label('Modul')
                    ->searchable()
                    ->weight('medium'),

                TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(50)
                    ->tooltip(
                        fn(?string $state): ?string => $state
                    ),

                TextColumn::make('created_at')
                    ->label('Waktu')
                    ->since()
                    ->sortable(),

            ])

            ->defaultSort('created_at', 'desc')

            ->paginated([5, 10, 25])

            ->defaultPaginationPageOption(5)

            ->striped();
    }
}
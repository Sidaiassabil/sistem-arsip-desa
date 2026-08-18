<?php

namespace App\Filament\Widgets;

use App\Models\Arsip;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatistikArsip extends StatsOverviewWidget
{
    protected static ?int $sort = 3;

    protected int|string|array $columnSpan = 'full';

    protected function getStats(): array
    {
        $total = Arsip::count();

        $aktif = Arsip::where('status', 'aktif')->count();

        $sampah = Arsip::onlyTrashed()->count();

        $tahunIni = Arsip::where('tahun', now()->year)->count();

        return [

            Stat::make(
                'Total Arsip',
                number_format($total)
            )
                ->description('Seluruh arsip yang tersimpan')
                ->descriptionIcon('heroicon-o-document-text')
                ->color('primary')
                ->chart([
                    2, 4, 3, 5, 4, 6, 7
                ]),

            Stat::make(
                'Arsip Aktif',
                number_format($aktif)
            )
                ->description('Dokumen yang masih aktif')
                ->descriptionIcon('heroicon-o-check-circle')
                ->color('success')
                ->chart([
                    3, 5, 4, 6, 5, 7, 8
                ]),

            Stat::make(
                'Di Sampah',
                number_format($sampah)
            )
                ->description('Dokumen dapat dipulihkan')
                ->descriptionIcon('heroicon-o-trash')
                ->color('danger')
                ->chart([
                    5, 4, 6, 3, 4, 2, 3
                ]),

            Stat::make(
                'Arsip Tahun Ini',
                number_format($tahunIni)
            )
                ->description('Arsip tahun ' . now()->year)
                ->descriptionIcon('heroicon-o-calendar')
                ->color('warning')
                ->chart([
                    2, 3, 5, 4, 6, 7, 9
                ]),
        ];
    }
}
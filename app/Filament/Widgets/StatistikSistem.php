<?php

namespace App\Filament\Widgets;

use App\Models\Arsip;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use App\Models\PerangkatDesa;
use App\Models\KegiatanPembangunan;
use App\Models\DokumenPembangunan;
use App\Models\DokumenKeuangan;
use App\Models\LogAktivitas;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatistikSistem extends StatsOverviewWidget
{
    protected int|string|array $columnSpan = 'full';

    protected static ?int $sort = 2;

    protected function getStats(): array
    {
        $totalSurat = SuratMasuk::count()
            + SuratKeluar::count();

        $totalPerangkat = PerangkatDesa::count();

        $totalKegiatan = KegiatanPembangunan::count();

        $totalDokumenPembangunan =
            DokumenPembangunan::count();

        $totalDokumenKeuangan =
            DokumenKeuangan::count();

        $totalAktivitas =
            LogAktivitas::count();

        return [

            Stat::make(
                'Total Surat',
                number_format($totalSurat)
            )
                ->description(
                    'Masuk '
                    . number_format(SuratMasuk::count())
                    . ' • Keluar '
                    . number_format(SuratKeluar::count())
                )
                ->descriptionIcon('heroicon-o-envelope')
                ->color('info')
                ->chart([
                    2, 4, 3, 5, 6, 7, $totalSurat,
                ]),

            Stat::make(
                'Perangkat Desa',
                number_format($totalPerangkat)
            )
                ->description('Data perangkat desa')
                ->descriptionIcon('heroicon-o-users')
                ->color('success')
                ->chart([
                    5, 6, 6, 7, 8, 9, $totalPerangkat,
                ]),

            Stat::make(
                'Kegiatan Pembangunan',
                number_format($totalKegiatan)
            )
                ->description('Seluruh kegiatan pembangunan')
                ->descriptionIcon('heroicon-o-building-office-2')
                ->color('warning')
                ->chart([
                    1, 2, 3, 4, 5, 6, $totalKegiatan,
                ]),

            Stat::make(
                'Dok. Pembangunan',
                number_format($totalDokumenPembangunan)
            )
                ->description('Dokumen pembangunan')
                ->descriptionIcon('heroicon-o-document-duplicate')
                ->color('primary')
                ->chart([
                    2, 3, 4, 5, 6, 8, $totalDokumenPembangunan,
                ]),

            Stat::make(
                'Dok. Keuangan',
                number_format($totalDokumenKeuangan)
            )
                ->description('Dokumen keuangan desa')
                ->descriptionIcon('heroicon-o-banknotes')
                ->color('success')
                ->chart([
                    3, 4, 5, 5, 7, 8, $totalDokumenKeuangan,
                ]),

            Stat::make(
                'Aktivitas Sistem',
                number_format($totalAktivitas)
            )
                ->description('Total aktivitas tercatat')
                ->descriptionIcon('heroicon-o-clock')
                ->color('gray')
                ->chart([
                    3, 5, 8, 7, 10, 12, $totalAktivitas,
                ]),
        ];
    }
}
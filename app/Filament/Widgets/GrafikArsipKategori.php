<?php

namespace App\Filament\Widgets;

use App\Models\Arsip;
use Filament\Widgets\ChartWidget;

class GrafikArsipKategori extends ChartWidget
{
    protected int|string|array $columnSpan = 1;

    protected static ?int $sort = 3;

    protected ?string $heading = 'Jumlah Arsip Berdasarkan Kategori';

    protected ?string $description =
        'Distribusi dokumen berdasarkan kategori arsip.';

    protected ?string $maxHeight = '320px';

    protected function getData(): array
    {
        $data = Arsip::query()
            ->join(
                'kategori_arsips',
                'arsips.kategori_arsip_id',
                '=',
                'kategori_arsips.id'
            )
            ->selectRaw(
                'kategori_arsips.nama, COUNT(arsips.id) as total'
            )
            ->groupBy(
                'kategori_arsips.id',
                'kategori_arsips.nama'
            )
            ->orderByDesc('total')
            ->pluck('total', 'nama');

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Arsip',
                    'data' => $data->values()->toArray(),

                    'borderWidth' => 2,
                    'hoverOffset' => 8,
                ],
            ],

            'labels' => $data->keys()->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }

    protected function getOptions(): array
    {
        return [
            'responsive' => true,

            'maintainAspectRatio' => false,

            'cutout' => '65%',

            'plugins' => [
                'legend' => [
                    'display' => true,

                    'position' => 'bottom',

                    'labels' => [
                        'usePointStyle' => true,
                        'padding' => 16,
                    ],
                ],

                'tooltip' => [
                    'enabled' => true,
                ],
            ],
        ];
    }
}
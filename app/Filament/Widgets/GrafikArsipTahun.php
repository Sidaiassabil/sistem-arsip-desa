<?php

namespace App\Filament\Widgets;

use App\Models\Arsip;
use Filament\Widgets\ChartWidget;

class GrafikArsipTahun extends ChartWidget
{
    protected int|string|array $columnSpan = 1;

    protected static ?int $sort = 2;

    protected ?string $heading = 'Jumlah Arsip Berdasarkan Tahun';

    protected ?string $description =
        'Perkembangan jumlah dokumen arsip berdasarkan tahun pengarsipan.';

    protected ?string $maxHeight = '320px';

    protected function getData(): array
    {
        $data = Arsip::query()
            ->selectRaw('tahun, COUNT(*) as total')
            ->groupBy('tahun')
            ->orderBy('tahun')
            ->pluck('total', 'tahun');

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Arsip',
                    'data' => $data->values()->toArray(),

                    // Membuat tampilan batang lebih rapi
                    'borderWidth' => 1,
                    'borderRadius' => 6,
                    'borderSkipped' => false,
                ],
            ],

            'labels' => $data->keys()
                ->map(fn ($tahun) => (string) $tahun)
                ->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'responsive' => true,

            'maintainAspectRatio' => false,

            'plugins' => [
                'legend' => [
                    'display' => false,
                ],

                'tooltip' => [
                    'enabled' => true,
                ],
            ],

            'scales' => [
                'x' => [
                    'grid' => [
                        'display' => false,
                    ],
                ],

                'y' => [
                    'beginAtZero' => true,

                    'ticks' => [
                        'precision' => 0,
                    ],
                ],
            ],
        ];
    }
}
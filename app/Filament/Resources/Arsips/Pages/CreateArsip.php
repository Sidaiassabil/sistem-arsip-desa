<?php

namespace App\Filament\Resources\Arsips\Pages;

use App\Filament\Resources\Arsips\ArsipResource;
use App\Models\Arsip;
use Filament\Resources\Pages\CreateRecord;

class CreateArsip extends CreateRecord
{
    protected static string $resource = ArsipResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $tahun = $data['tahun'];

        $lastNumber = Arsip::where('tahun', $tahun)
            ->orderByDesc('id')
            ->value('kode_arsip');

        $number = 1;

        if ($lastNumber) {
            $parts = explode('-', $lastNumber);
            $number = ((int) end($parts)) + 1;
        }

        $data['kode_arsip'] = 'ARS-' . $tahun . '-' . str_pad(
            $number,
            4,
            '0',
            STR_PAD_LEFT
        );

        $data['user_id'] = auth()->id();

        return $data;
    }
}
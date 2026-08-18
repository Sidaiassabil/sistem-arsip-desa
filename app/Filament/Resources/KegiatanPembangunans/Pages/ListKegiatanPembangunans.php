<?php

namespace App\Filament\Resources\KegiatanPembangunans\Pages;

use App\Filament\Resources\KegiatanPembangunans\KegiatanPembangunanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKegiatanPembangunans extends ListRecords
{
    protected static string $resource = KegiatanPembangunanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

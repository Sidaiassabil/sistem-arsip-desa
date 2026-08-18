<?php

namespace App\Filament\Resources\KegiatanPembangunans\Pages;

use App\Filament\Resources\KegiatanPembangunans\KegiatanPembangunanResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditKegiatanPembangunan extends EditRecord
{
    protected static string $resource = KegiatanPembangunanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

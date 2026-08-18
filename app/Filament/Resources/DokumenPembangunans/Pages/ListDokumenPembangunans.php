<?php

namespace App\Filament\Resources\DokumenPembangunans\Pages;

use App\Filament\Resources\DokumenPembangunans\DokumenPembangunanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDokumenPembangunans extends ListRecords
{
    protected static string $resource = DokumenPembangunanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

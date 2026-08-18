<?php

namespace App\Filament\Resources\DokumenKeuangans\Pages;

use App\Filament\Resources\DokumenKeuangans\DokumenKeuanganResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDokumenKeuangans extends ListRecords
{
    protected static string $resource = DokumenKeuanganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

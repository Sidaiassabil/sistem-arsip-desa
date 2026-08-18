<?php

namespace App\Filament\Resources\DokumenPembangunans\Pages;

use App\Filament\Resources\DokumenPembangunans\DokumenPembangunanResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDokumenPembangunan extends EditRecord
{
    protected static string $resource = DokumenPembangunanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

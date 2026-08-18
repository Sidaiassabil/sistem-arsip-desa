<?php

namespace App\Filament\Resources\DokumenKeuangans\Pages;

use App\Filament\Resources\DokumenKeuangans\DokumenKeuanganResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDokumenKeuangan extends EditRecord
{
    protected static string $resource = DokumenKeuanganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

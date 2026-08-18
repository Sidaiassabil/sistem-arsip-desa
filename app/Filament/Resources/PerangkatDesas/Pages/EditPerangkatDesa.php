<?php

namespace App\Filament\Resources\PerangkatDesas\Pages;

use App\Filament\Resources\PerangkatDesas\PerangkatDesaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPerangkatDesa extends EditRecord
{
    protected static string $resource = PerangkatDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\PerangkatDesas\Pages;

use App\Filament\Resources\PerangkatDesas\PerangkatDesaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPerangkatDesas extends ListRecords
{
    protected static string $resource = PerangkatDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

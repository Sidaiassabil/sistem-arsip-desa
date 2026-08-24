<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use App\Models\User;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $user = $this->record;

        /*
        |--------------------------------------------------------------------------
        | Admin tidak boleh menonaktifkan dirinya sendiri
        |--------------------------------------------------------------------------
        */

        if (
            $user->id === auth()->id() &&
            isset($data['is_active']) &&
            $data['is_active'] === false
        ) {
            Notification::make()
                ->danger()
                ->title('Tidak dapat menonaktifkan akun sendiri')
                ->body('Akun yang sedang digunakan untuk login harus tetap aktif.')
                ->send();

            $this->halt();

            return $data;
        }

        /*
        |--------------------------------------------------------------------------
        | Minimal harus ada satu admin aktif
        |--------------------------------------------------------------------------
        */

        if (
            $user->is_active &&
            isset($data['is_active']) &&
            $data['is_active'] === false
        ) {
            $activeUsers = User::where('is_active', true)->count();

            if ($activeUsers <= 1) {
                Notification::make()
                    ->danger()
                    ->title('Tidak dapat menonaktifkan admin terakhir')
                    ->body('Sistem harus memiliki minimal satu admin yang aktif.')
                    ->send();

                $this->halt();

                return $data;
            }
        }

        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
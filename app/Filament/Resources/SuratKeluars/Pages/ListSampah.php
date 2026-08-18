<?php

namespace App\Filament\Resources\SuratKeluars\Pages;

use App\Filament\Resources\SuratKeluars\SuratKeluarResource;
use App\Models\SuratKeluar;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\Storage;

class ListSampah extends Page
{
    protected static string $resource = SuratKeluarResource::class;

    protected static ?string $title = 'Sampah Surat Keluar';

    protected static ?string $slug = 'sampah';

    protected string $view =
        'filament.resources.surat-keluars.pages.list-sampah';

    protected ?string $heading = 'Sampah Surat Keluar';

    protected ?string $subheading =
        'Surat keluar yang dihapus sementara dan masih dapat dipulihkan.';

    public function restoreSuratKeluar(int $id): void
    {
        $surat = SuratKeluar::onlyTrashed()->findOrFail($id);

        $surat->restore();

        Notification::make()
            ->title('Surat keluar berhasil dipulihkan')
            ->success()
            ->send();
    }

    public function deletePermanently(int $id): void
    {
        $surat = SuratKeluar::onlyTrashed()->findOrFail($id);

        if (
            $surat->file &&
            Storage::disk('public')->exists($surat->file)
        ) {
            Storage::disk('public')->delete($surat->file);
        }

        $surat->forceDelete();

        Notification::make()
            ->title('Surat keluar berhasil dihapus permanen')
            ->success()
            ->send();
    }
}
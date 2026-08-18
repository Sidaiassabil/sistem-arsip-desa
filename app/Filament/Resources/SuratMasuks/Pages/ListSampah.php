<?php

namespace App\Filament\Resources\SuratMasuks\Pages;

use App\Filament\Resources\SuratMasuks\SuratMasukResource;
use App\Models\SuratMasuk;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\Storage;

class ListSampah extends Page
{
    protected static string $resource = SuratMasukResource::class;

    protected static ?string $title = 'Sampah Surat Masuk';

    protected static ?string $slug = 'sampah';

    protected string $view =
        'filament.resources.suratmasuks.pages.list-sampah';

    protected ?string $heading = 'Sampah Surat Masuk';

    protected ?string $subheading =
        'Surat masuk yang dihapus sementara dan masih dapat dipulihkan.';

    public function restoreSuratMasuk(int $id): void
    {
        $surat = SuratMasuk::onlyTrashed()->findOrFail($id);

        $surat->restore();

        Notification::make()
            ->title('Surat masuk berhasil dipulihkan')
            ->success()
            ->send();
    }

    public function deletePermanently(int $id): void
    {
        $surat = SuratMasuk::onlyTrashed()->findOrFail($id);

        if (
            $surat->file &&
            Storage::disk('public')->exists($surat->file)
        ) {
            Storage::disk('public')->delete($surat->file);
        }

        $surat->forceDelete();

        Notification::make()
            ->title('Surat masuk berhasil dihapus permanen')
            ->success()
            ->send();
    }
}
<?php

namespace App\Filament\Resources\Arsips\Pages;

use App\Filament\Resources\Arsips\ArsipResource;
use App\Models\Arsip;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\Storage;

class ListSampah extends Page
{
    protected static string $resource = ArsipResource::class;

    protected static ?string $title = 'Sampah Arsip';

    protected static ?string $slug = 'sampah';

    protected string $view =
        'filament.resources.arsips.pages.list-sampah';

    protected ?string $heading = 'Sampah Arsip';

    protected ?string $subheading =
        'Arsip yang dihapus sementara dan masih dapat dipulihkan.';

    public function restoreArsip(int $id): void
    {
        $arsip = Arsip::onlyTrashed()->findOrFail($id);

        $arsip->restore();

        Notification::make()
            ->title('Arsip berhasil dipulihkan')
            ->success()
            ->send();
    }

    public function deletePermanently(int $id): void
    {
        $arsip = Arsip::onlyTrashed()->findOrFail($id);

        if (
            $arsip->file &&
            Storage::disk('public')->exists($arsip->file)
        ) {
            Storage::disk('public')->delete($arsip->file);
        }

        $arsip->forceDelete();

        Notification::make()
            ->title('Arsip berhasil dihapus permanen')
            ->success()
            ->send();
    }
}
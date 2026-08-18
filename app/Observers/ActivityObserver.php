<?php

namespace App\Observers;

use App\Models\LogAktivitas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ActivityObserver
{
    public function created(Model $model): void
    {
        $this->log(
            model: $model,
            aktivitas: 'Menambahkan',
            deskripsi: 'Menambahkan data baru.'
        );
    }

    public function updated(Model $model): void
    {
        $this->log(
            model: $model,
            aktivitas: 'Mengubah',
            deskripsi: 'Mengubah data.'
        );
    }

    public function deleted(Model $model): void
    {
        $this->log(
            model: $model,
            aktivitas: 'Menghapus',
            deskripsi: 'Menghapus data.'
        );
    }

    protected function log(
        Model $model,
        string $aktivitas,
        string $deskripsi
    ): void {
        LogAktivitas::create([
            'user_id' => Auth::id(),
            'aktivitas' => $aktivitas,
            'modul' => $this->getModul($model),
            'model_type' => $model::class,
            'model_id' => $model->getKey(),
            'deskripsi' => $deskripsi,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }

    protected function getModul(Model $model): string
    {
        return match ($model::class) {
            \App\Models\Arsip::class => 'Arsip Dokumen',
            \App\Models\KategoriArsip::class => 'Kategori Arsip',
            \App\Models\SuratMasuk::class => 'Surat Masuk',
            \App\Models\SuratKeluar::class => 'Surat Keluar',
            \App\Models\PerangkatDesa::class => 'Perangkat Desa',
            \App\Models\KegiatanPembangunan::class => 'Kegiatan Pembangunan',
            \App\Models\DokumenPembangunan::class => 'Dokumen Pembangunan',
            \App\Models\DokumenKeuangan::class => 'Dokumen Keuangan',
            default => class_basename($model),
        };
    }
}
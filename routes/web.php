<?php

use App\Http\Controllers\DokumenKeuanganController;
use App\Http\Controllers\DokumenPembangunanController;
use App\Http\Controllers\PerangkatDesaController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratMasukController;
use App\Models\Arsip;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

Route::redirect('/', '/admin/login');

Route::get('/arsip/{arsip}/preview', function (Arsip $arsip) {
    return view('arsip.preview', compact('arsip'));
})
    ->middleware('auth')
    ->name('arsip.preview');

Route::get('/arsip/{arsip}/file', function (Arsip $arsip) {
    $disk = Storage::disk('public');

    abort_unless($disk->exists($arsip->file), 404);

    $path = $disk->path($arsip->file);

    $extension = pathinfo($arsip->file, PATHINFO_EXTENSION);

    $filename = sprintf(
        '%s-%s.%s',
        $arsip->kode_arsip,
        Str::slug($arsip->judul),
        $extension
    );

    return response()->file($path, [
        'Content-Disposition' => 'inline; filename="' . $filename . '"',
    ]);
})
    ->middleware('auth')
    ->name('arsip.file');

Route::get('/arsip/{arsip}/download', function (Arsip $arsip) {
    $disk = Storage::disk('public');

    abort_unless($disk->exists($arsip->file), 404);

    $path = $disk->path($arsip->file);

    $extension = pathinfo($arsip->file, PATHINFO_EXTENSION);

    $filename = sprintf(
        '%s-%s.%s',
        $arsip->kode_arsip,
        Str::slug($arsip->judul),
        $extension
    );

    return response()->download($path, $filename);
})
    ->middleware('auth')
    ->name('arsip.download');

Route::get(
    '/surat-masuk/{suratMasuk}/preview',
    [SuratMasukController::class, 'preview']
)
    ->middleware('auth')
    ->name('surat-masuk.preview');

Route::get(
    '/surat-masuk/{suratMasuk}/file',
    [SuratMasukController::class, 'file']
)
    ->middleware('auth')
    ->name('surat-masuk.file');

Route::get(
    '/surat-masuk/{suratMasuk}/download',
    [SuratMasukController::class, 'download']
)
    ->middleware('auth')
    ->name('surat-masuk.download');

Route::get(
    '/surat-keluar/{suratKeluar}/preview',
    [SuratKeluarController::class, 'preview']
)
    ->middleware('auth')
    ->name('surat-keluar.preview');

Route::get(
    '/surat-keluar/{suratKeluar}/file',
    [SuratKeluarController::class, 'file']
)
    ->middleware('auth')
    ->name('surat-keluar.file');

Route::get(
    '/surat-keluar/{suratKeluar}/download',
    [SuratKeluarController::class, 'download']
)
    ->middleware('auth')
    ->name('surat-keluar.download');

Route::get(
    '/perangkat-desa/{perangkatDesa}/sk/preview',
    [PerangkatDesaController::class, 'preview']
)
    ->middleware('auth')
    ->name('perangkat-desa.sk.preview');

Route::get(
    '/perangkat-desa/{perangkatDesa}/sk/file',
    [PerangkatDesaController::class, 'file']
)
    ->middleware('auth')
    ->name('perangkat-desa.sk.file');

Route::get(
    '/dokumen-pembangunan/{dokumenPembangunan}/preview',
    [DokumenPembangunanController::class, 'preview']
)
    ->middleware('auth')
    ->name('dokumen-pembangunan.preview');

Route::get(
    '/dokumen-pembangunan/{dokumenPembangunan}/file',
    [DokumenPembangunanController::class, 'file']
)
    ->middleware('auth')
    ->name('dokumen-pembangunan.file');

Route::get(
    '/dokumen-keuangan/{dokumenKeuangan}/preview',
    [DokumenKeuanganController::class, 'preview']
)
    ->middleware('auth')
    ->name('dokumen-keuangan.preview');

Route::get(
    '/dokumen-keuangan/{dokumenKeuangan}/file',
    [DokumenKeuanganController::class, 'file']
)
    ->middleware('auth')
    ->name('dokumen-keuangan.file');
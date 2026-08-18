<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SuratMasukController extends Controller
{
    public function preview(SuratMasuk $suratMasuk)
    {
        abort_unless(
            $suratMasuk->file &&
            Storage::disk('public')->exists($suratMasuk->file),
            404
        );

        return view('surat-masuk.preview', [
            'surat' => $suratMasuk,
        ]);
    }

    public function file(SuratMasuk $suratMasuk)
    {
        $disk = Storage::disk('public');

        abort_unless(
            $suratMasuk->file &&
            $disk->exists($suratMasuk->file),
            404
        );

        $path = $disk->path($suratMasuk->file);

        $extension = strtolower(
            pathinfo($suratMasuk->file, PATHINFO_EXTENSION)
        );

        $filename = sprintf(
            '%s-%s.%s',
            $suratMasuk->nomor_agenda,
            Str::slug($suratMasuk->perihal),
            $extension
        );

        return response()->file($path, [
            'Content-Disposition' =>
                'inline; filename="' . $filename . '"',
        ]);
    }

    public function download(SuratMasuk $suratMasuk)
    {
        $disk = Storage::disk('public');

        abort_unless(
            $suratMasuk->file &&
            $disk->exists($suratMasuk->file),
            404
        );

        $path = $disk->path($suratMasuk->file);

        $extension = strtolower(
            pathinfo($suratMasuk->file, PATHINFO_EXTENSION)
        );

        $filename = sprintf(
            '%s-%s.%s',
            $suratMasuk->nomor_agenda,
            Str::slug($suratMasuk->perihal),
            $extension
        );

        return response()->download(
            $path,
            $filename
        );
    }
}
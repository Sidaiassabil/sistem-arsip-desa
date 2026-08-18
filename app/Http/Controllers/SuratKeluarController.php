<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SuratKeluarController extends Controller
{
    public function preview(SuratKeluar $suratKeluar)
    {
        abort_unless(
            $suratKeluar->file &&
            Storage::disk('public')->exists($suratKeluar->file),
            404
        );

        return view('surat-keluar.preview', [
            'surat' => $suratKeluar,
        ]);
    }

    public function file(SuratKeluar $suratKeluar)
    {
        $disk = Storage::disk('public');

        abort_unless(
            $suratKeluar->file &&
            $disk->exists($suratKeluar->file),
            404
        );

        $path = $disk->path($suratKeluar->file);

        $extension = strtolower(
            pathinfo($suratKeluar->file, PATHINFO_EXTENSION)
        );

        $filename = sprintf(
            '%s-%s.%s',
            $suratKeluar->nomor_agenda,
            Str::slug($suratKeluar->perihal),
            $extension
        );

        return response()->file($path, [
            'Content-Disposition' =>
                'inline; filename="' . $filename . '"',
        ]);
    }

    public function download(SuratKeluar $suratKeluar)
    {
        $disk = Storage::disk('public');

        abort_unless(
            $suratKeluar->file &&
            $disk->exists($suratKeluar->file),
            404
        );

        $path = $disk->path($suratKeluar->file);

        $extension = strtolower(
            pathinfo($suratKeluar->file, PATHINFO_EXTENSION)
        );

        $filename = sprintf(
            '%s-%s.%s',
            $suratKeluar->nomor_agenda,
            Str::slug($suratKeluar->perihal),
            $extension
        );

        return response()->download(
            $path,
            $filename
        );
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\DokumenKeuangan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DokumenKeuanganController extends Controller
{
    public function preview(DokumenKeuangan $dokumenKeuangan)
    {
        abort_unless($dokumenKeuangan->file, 404);

        $disk = Storage::disk('public');

        abort_unless(
            $disk->exists($dokumenKeuangan->file),
            404
        );

        $extension = strtolower(
            pathinfo($dokumenKeuangan->file, PATHINFO_EXTENSION)
        );

        $canPreview = $extension === 'pdf';

        $fileUrl = route(
            'dokumen-keuangan.file',
            $dokumenKeuangan
        );

        return view('dokumen-keuangan.preview', [
            'dokumenKeuangan' => $dokumenKeuangan,
            'extension' => $extension,
            'canPreview' => $canPreview,
            'fileUrl' => $fileUrl,
        ]);
    }

    public function file(DokumenKeuangan $dokumenKeuangan)
    {
        abort_unless($dokumenKeuangan->file, 404);

        $disk = Storage::disk('public');

        abort_unless(
            $disk->exists($dokumenKeuangan->file),
            404
        );

        $path = $disk->path($dokumenKeuangan->file);

        $extension = strtolower(
            pathinfo($dokumenKeuangan->file, PATHINFO_EXTENSION)
        );

        $filename = sprintf(
            'Dokumen-Keuangan-%s.%s',
            Str::slug($dokumenKeuangan->nama_dokumen),
            $extension
        );

        return response()->file($path, [
            'Content-Disposition' =>
                'inline; filename="' . $filename . '"',
        ]);
    }
}
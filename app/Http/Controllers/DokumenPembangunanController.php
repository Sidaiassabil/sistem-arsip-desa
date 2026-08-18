<?php

namespace App\Http\Controllers;

use App\Models\DokumenPembangunan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DokumenPembangunanController extends Controller
{
    public function preview(DokumenPembangunan $dokumenPembangunan)
    {
        abort_unless($dokumenPembangunan->file, 404);

        $disk = Storage::disk('public');

        abort_unless(
            $disk->exists($dokumenPembangunan->file),
            404
        );

        $extension = strtolower(
            pathinfo($dokumenPembangunan->file, PATHINFO_EXTENSION)
        );

        $canPreview = $extension === 'pdf';

        $fileUrl = route(
            'dokumen-pembangunan.file',
            $dokumenPembangunan
        );

        return view('dokumen-pembangunan.preview', [
            'dokumenPembangunan' => $dokumenPembangunan,
            'extension' => $extension,
            'canPreview' => $canPreview,
            'fileUrl' => $fileUrl,
        ]);
    }

    public function file(DokumenPembangunan $dokumenPembangunan)
    {
        abort_unless($dokumenPembangunan->file, 404);

        $disk = Storage::disk('public');

        abort_unless(
            $disk->exists($dokumenPembangunan->file),
            404
        );

        $path = $disk->path($dokumenPembangunan->file);

        $extension = strtolower(
            pathinfo($dokumenPembangunan->file, PATHINFO_EXTENSION)
        );

        $filename = sprintf(
            'Dokumen-%s.%s',
            Str::slug($dokumenPembangunan->nama_dokumen),
            $extension
        );

        return response()->file($path, [
            'Content-Disposition' =>
                'inline; filename="' . $filename . '"',
        ]);
    }
}
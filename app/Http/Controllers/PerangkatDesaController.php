<?php

namespace App\Http\Controllers;

use App\Models\PerangkatDesa;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PerangkatDesaController extends Controller
{
    public function preview(PerangkatDesa $perangkatDesa)
    {
        abort_unless($perangkatDesa->file_sk, 404);

        $disk = Storage::disk('public');

        abort_unless(
            $disk->exists($perangkatDesa->file_sk),
            404
        );

        $extension = strtolower(
            pathinfo($perangkatDesa->file_sk, PATHINFO_EXTENSION)
        );

        $canPreview = $extension === 'pdf';

        $fileUrl = route(
            'perangkat-desa.sk.file',
            $perangkatDesa
        );

        return view('perangkat-desa.preview', [
            'perangkatDesa' => $perangkatDesa,
            'extension' => $extension,
            'canPreview' => $canPreview,
            'fileUrl' => $fileUrl,
        ]);
    }

    public function file(PerangkatDesa $perangkatDesa)
    {
        abort_unless($perangkatDesa->file_sk, 404);

        $disk = Storage::disk('public');

        abort_unless(
            $disk->exists($perangkatDesa->file_sk),
            404
        );

        $path = $disk->path($perangkatDesa->file_sk);

        $extension = strtolower(
            pathinfo($perangkatDesa->file_sk, PATHINFO_EXTENSION)
        );

        $filename = sprintf(
            'SK-%s.%s',
            Str::slug($perangkatDesa->nama),
            $extension
        );

        return response()->file($path, [
            'Content-Disposition' =>
                'inline; filename="' . $filename . '"',
        ]);
    }
}
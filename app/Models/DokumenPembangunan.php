<?php

namespace App\Models;

use App\Models\KegiatanPembangunan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DokumenPembangunan extends Model
{
    protected $fillable = [
        'kegiatan_pembangunan_id',
        'nama_dokumen',
        'tahun',
        'nomor_dokumen',
        'tanggal_dokumen',
        'jenis_dokumen',
        'keterangan',
        'file',
    ];

    protected function casts(): array
    {
        return [
            'tahun' => 'integer',
            'tanggal_dokumen' => 'date',
        ];
    }

    public function kegiatanPembangunan(): BelongsTo
    {
        return $this->belongsTo(
            KegiatanPembangunan::class,
            'kegiatan_pembangunan_id'
        );
    }
}
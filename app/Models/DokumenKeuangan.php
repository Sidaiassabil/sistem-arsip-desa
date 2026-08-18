<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DokumenKeuangan extends Model
{
    protected $fillable = [
        'nama_dokumen',
        'tahun',
        'nomor_dokumen',
        'tanggal_dokumen',
        'jenis_dokumen',
        'sumber_dana',
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
}
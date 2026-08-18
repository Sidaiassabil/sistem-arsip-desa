<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KegiatanPembangunan extends Model
{
    protected $fillable = [
        'nama_kegiatan',
        'lokasi',
        'tahun',
        'anggaran',
        'sumber_dana',
        'volume',
        'pelaksana',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
        'deskripsi',
        'foto',
    ];

    protected function casts(): array
    {
        return [
            'tahun' => 'integer',
            'anggaran' => 'decimal:2',
            'tanggal_mulai' => 'date',
            'tanggal_selesai' => 'date',
        ];
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerangkatDesa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jabatan',
        'nip_nik',
        'nomor_sk',
        'tanggal_sk',
        'status',
        'foto',
        'file_sk',
        'keterangan',
    ];

    protected $casts = [
        'tanggal_sk' => 'date',
    ];
}
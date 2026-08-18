<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Arsip extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'kode_arsip',
        'nomor_dokumen',
        'judul',
        'kategori_arsip_id',
        'tahun',
        'tanggal_dokumen',
        'sumber',
        'deskripsi',
        'file',
        'status',
        'user_id',
    ];

    protected $casts = [
        'tanggal_dokumen' => 'date',
    ];

    public function kategoriArsip(): BelongsTo
    {
        return $this->belongsTo(KategoriArsip::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
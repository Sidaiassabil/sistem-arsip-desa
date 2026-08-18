<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dokumen_keuangans', function (Blueprint $table) {
            $table->id();

            $table->string('nama_dokumen');
            $table->year('tahun');
            $table->string('nomor_dokumen')->nullable();
            $table->date('tanggal_dokumen')->nullable();

            $table->enum('jenis_dokumen', [
                'APBDes',
                'RAB',
                'SPJ',
                'LPJ',
                'Laporan Keuangan',
                'Bukti Pengeluaran',
                'Kwitansi',
                'Berita Acara',
                'Dokumen Lainnya',
            ]);

            $table->string('sumber_dana')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('file');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumen_keuangans');
    }
};
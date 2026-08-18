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
        Schema::create('dokumen_pembangunans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('kegiatan_pembangunan_id')
                ->constrained('kegiatan_pembangunans')
                ->cascadeOnDelete();

            $table->string('nama_dokumen');
            $table->year('tahun');
            $table->string('nomor_dokumen')->nullable();
            $table->date('tanggal_dokumen')->nullable();

            $table->enum('jenis_dokumen', [
                'RAB',
                'Proposal',
                'SPK',
                'Kontrak',
                'Laporan',
                'Berita Acara',
                'LPJ',
                'Dokumen Lainnya',
            ]);

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
        Schema::dropIfExists('dokumen_pembangunans');
    }
};
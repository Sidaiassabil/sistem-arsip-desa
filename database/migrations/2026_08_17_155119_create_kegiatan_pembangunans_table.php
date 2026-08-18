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
        Schema::create('kegiatan_pembangunans', function (Blueprint $table) {
            $table->id();

            $table->string('nama_kegiatan');
            $table->string('lokasi');
            $table->year('tahun');
            $table->decimal('anggaran', 15, 2)->nullable();
            $table->string('sumber_dana')->nullable();
            $table->string('volume')->nullable();
            $table->string('pelaksana')->nullable();

            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_selesai')->nullable();

            $table->enum('status', [
                'Perencanaan',
                'Berjalan',
                'Selesai',
            ])->default('Perencanaan');

            $table->text('deskripsi')->nullable();
            $table->string('foto')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatan_pembangunans');
    }
};
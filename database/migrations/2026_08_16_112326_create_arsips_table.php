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
        Schema::create('arsips', function (Blueprint $table) {
            $table->id();

            $table->string('kode_arsip')->unique();
            $table->string('nomor_dokumen')->nullable();
            $table->string('judul');

            $table->foreignId('kategori_arsip_id')
                ->constrained('kategori_arsips')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->year('tahun');
            $table->date('tanggal_dokumen');

            $table->string('sumber')->nullable();
            $table->text('deskripsi')->nullable();

            $table->string('file');
            $table->string('status')->default('aktif');

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->timestamps();

            $table->index('tahun');
            $table->index('tanggal_dokumen');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arsips');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surat_keluars', function (Blueprint $table) {
            $table->id();

            $table->string('nomor_agenda', 50)->unique();

            $table->string('nomor_surat', 100)->unique();

            $table->date('tanggal_surat');

            $table->string('tujuan_surat', 255);

            $table->string('perihal', 255);

            $table->string('penandatangan', 150);

            $table->enum('status', [
                'draft',
                'ditandatangani',
                'dikirim',
                'selesai',
            ])->default('draft');

            $table->string('file');

            $table->text('keterangan')->nullable();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->softDeletes();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surat_keluars');
    }
};
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
        Schema::create('perangkat_desas', function (Blueprint $table) {
            $table->id();

            $table->string('nama');
            $table->string('jabatan');
            $table->string('nip_nik')->nullable();

            $table->string('nomor_sk')->nullable();
            $table->date('tanggal_sk')->nullable();

            $table->enum('status', [
                'aktif',
                'tidak_aktif',
            ])->default('aktif');

            $table->string('foto')->nullable();
            $table->string('file_sk')->nullable();

            $table->text('keterangan')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perangkat_desas');
    }
};

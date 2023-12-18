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
        Schema::create('detailsurats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users');
            $table->foreignId('id_surat')->constrained('surats');
            $table->string('kewarganegaraan')->nullable();
            $table->string('status_perkawinan')->nullable();
            $table->date('tanggal_kegiatan')->nullable();
            $table->string('tempat_kegiatan')->nullable();
            $table->string('nama_kegiatan')->nullable();
            $table->string('tempat_usaha')->nullable();
            $table->string('nama_usaha')->nullable();
            $table->string('umur')->nullable();
            $table->string('status_pengajuan')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detailsurats');
    }
};

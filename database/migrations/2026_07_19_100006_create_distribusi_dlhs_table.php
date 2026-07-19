<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('distribusi_dlhs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('detail_pilahan_id')->constrained()->cascadeOnDelete();
            $table->foreignId('dlh_id')->nullable()->constrained('users')->nullOnDelete(); // DLH wilayah terdekat
            $table->enum('status', ['diterima_dlh', 'dikirim_tpa', 'terbuang'])->default('diterima_dlh');
            $table->timestamp('tanggal_terima')->nullable();
            $table->timestamp('tanggal_kirim_tpa')->nullable();
            $table->timestamp('tanggal_terbuang')->nullable();
            $table->string('bukti_foto')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('distribusi_dlhs');
    }
};

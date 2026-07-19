<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('setoran_sampahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // user penyetor
            $table->foreignId('bank_sampah_id')->nullable()->constrained('users')->nullOnDelete(); // bank sampah terdekat/terpilih
            $table->text('deskripsi');
            $table->string('foto')->nullable(); // path foto bukti dari penyetor
            $table->decimal('estimasi_berat', 8, 2)->nullable();
            $table->enum('status', ['menunggu', 'diverifikasi', 'dipilah', 'selesai'])->default('menunggu');
            $table->timestamp('tanggal_setor')->useCurrent();
            $table->text('catatan_bank_sampah')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('setoran_sampahs');
    }
};

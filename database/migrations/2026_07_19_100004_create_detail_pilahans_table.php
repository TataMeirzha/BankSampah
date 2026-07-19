<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_pilahans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('setoran_sampah_id')->constrained()->cascadeOnDelete();
            $table->foreignId('kategori_sampah_id')->constrained()->restrictOnDelete();
            $table->decimal('berat_aktual', 8, 2); // hasil timbang ulang oleh bank sampah
            $table->enum('status_kelayakan', ['layak', 'tidak_layak']);
            $table->text('catatan')->nullable();
            $table->string('foto_bukti')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_pilahans');
    }
};

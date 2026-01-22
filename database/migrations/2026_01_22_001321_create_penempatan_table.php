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
        Schema::create('penempatan', function (Blueprint $table) {
            $table->id();

            // KUNCI CASCADING DELETE UTAMA
            // Jika data 'peserta' dihapus, data penempatan ini otomatis hilang
            $table->foreignId('peserta_id')->unique()->constrained('peserta')->onDelete('cascade');

            // Jika pembimbing dihapus, data penempatan JANGAN hilang (set null),
            // biar history anak magang tidak rusak.
            $table->foreignId('pembimbing_id')->nullable()->constrained('pembimbing')->onDelete('set null');

            $table->string('ruangan')->nullable();
            $table->text('catatan_khusus')->nullable(); // Opsional

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penempatan');
    }
};

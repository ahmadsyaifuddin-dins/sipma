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
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();

            // Relasi ke Peserta (Cascade Delete)
            $table->foreignId('peserta_id')->constrained('peserta')->onDelete('cascade');

            $table->date('tgl');
            $table->time('jam_masuk')->nullable();
            $table->time('jam_keluar')->nullable();

            // Enum Status
            $table->enum('status', ['hadir', 'izin', 'sakit', 'alfa'])->default('hadir');

            // Keterangan wajib diisi via Validasi Controller jika status != hadir
            $table->text('keterangan')->nullable();

            // Opsional: Jika butuh bukti foto (misal surat dokter)
            $table->string('foto_bukti')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};

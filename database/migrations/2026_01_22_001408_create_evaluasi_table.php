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
        Schema::create('evaluasi', function (Blueprint $table) {
            $table->id();

            // Relasi ke Peserta (Cascade Delete & Unique karena 1 peserta cuma punya 1 nilai akhir)
            $table->foreignId('peserta_id')->unique()->constrained('peserta')->onDelete('cascade');

            // Nilai Detail (Decimal biar presisi)
            $table->decimal('nilai_disiplin', 5, 2);
            $table->decimal('nilai_kerjasama', 5, 2);
            $table->decimal('nilai_inisiatif', 5, 2);
            $table->decimal('nilai_kerajinan', 5, 2);

            // Nilai Rata-rata / Akhir
            $table->decimal('nilai_rata_rata', 5, 2);

            // Konversi Otomatis (A/B/C) & (Sangat Baik/Baik)
            $table->string('predikat_huruf', 2); // A, B, C
            $table->string('predikat_keterangan'); // Sangat Baik, Baik

            $table->text('catatan_pembimbing')->nullable();
            $table->string('file_sertifikat')->nullable(); // Path jika sertifikat digenerate

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluasi');
    }
};

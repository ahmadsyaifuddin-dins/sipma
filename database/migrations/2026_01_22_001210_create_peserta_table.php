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
        Schema::create('peserta', function (Blueprint $table) {
            $table->id();
            // Relasi ke User Login (Cascade: Hapus Akun User -> Hapus Data Peserta)
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            $table->string('nim_nisn')->unique();
            $table->string('nama_lengkap');
            $table->string('institusi'); // Nama Sekolah/Kampus
            $table->string('jurusan');
            $table->string('no_hp');
            $table->text('alamat')->nullable();
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');

            // Status Pendaftaran
            $table->enum('status', ['pending', 'aktif', 'selesai', 'ditolak'])->default('pending');

            // File path (nullable agar bisa daftar dulu baru upload belakangan jika perlu)
            $table->string('foto_profil')->nullable();
            $table->string('file_surat_pengantar')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peserta');
    }
};

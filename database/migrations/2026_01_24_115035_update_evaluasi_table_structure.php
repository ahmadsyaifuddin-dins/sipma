<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('evaluasi', function (Blueprint $table) {
            // Tambahkan kolom-kolom baru sesuai Project Lama
            // Kita urutkan biar rapi di database (pakai after)

            $table->decimal('nilai_etika', 5, 2)->default(0)->after('nilai_disiplin');
            $table->decimal('nilai_motivasi', 5, 2)->default(0)->after('nilai_etika');

            // 'nilai_kualitas' menggantikan 'nilai_kerajinan'
            $table->decimal('nilai_kualitas', 5, 2)->default(0)->after('nilai_motivasi');

            $table->decimal('nilai_penguasaan', 5, 2)->default(0)->after('nilai_kualitas');
            $table->decimal('nilai_produktivitas', 5, 2)->default(0)->after('nilai_penguasaan');

            // 'nilai_kerjasama' sudah ada

            $table->decimal('nilai_komunikasi', 5, 2)->default(0)->after('nilai_kerjasama');

            // 'nilai_inisiatif' sudah ada

            $table->decimal('nilai_adaptasi', 5, 2)->default(0)->after('nilai_inisiatif');

            // Hapus kolom 'nilai_kerajinan' karena tidak ada di standar lama (diganti kualitas)
            $table->dropColumn('nilai_kerajinan');
        });
    }

    public function down(): void
    {
        Schema::table('evaluasi', function (Blueprint $table) {
            $table->dropColumn([
                'nilai_etika', 'nilai_motivasi', 'nilai_kualitas',
                'nilai_penguasaan', 'nilai_produktivitas',
                'nilai_komunikasi', 'nilai_adaptasi',
            ]);
            $table->decimal('nilai_kerajinan', 5, 2)->default(0);
        });
    }
};

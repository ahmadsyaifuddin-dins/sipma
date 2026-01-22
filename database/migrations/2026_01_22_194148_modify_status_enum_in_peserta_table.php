<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Kita gunakan RAW statement karena mengubah ENUM di Laravel kadang tricky
        DB::statement("ALTER TABLE peserta MODIFY COLUMN status ENUM('pending', 'aktif', 'menunggu_nilai', 'selesai', 'ditolak') DEFAULT 'pending'");
    }

    public function down()
    {
        DB::statement("ALTER TABLE peserta MODIFY COLUMN status ENUM('pending', 'aktif', 'selesai', 'ditolak') DEFAULT 'pending'");
    }
};

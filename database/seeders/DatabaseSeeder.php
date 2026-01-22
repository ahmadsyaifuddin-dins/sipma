<?php

namespace Database\Seeders;

use App\Models\Absensi;
use App\Models\Pembimbing;
use App\Models\Penempatan;
use App\Models\Peserta;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. BUAT AKUN ADMIN
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'), // Password default: password
            'role' => 'admin',
        ]);

        // 2. BUAT DATA PEMBIMBING (MASTER DATA)
        $pembimbing1 = Pembimbing::create([
            'nip' => '198501012010011001',
            'nama' => 'Rasyidi, S.Kom',
            'jabatan' => 'Pranata Komputer Ahli Muda',
            'bidang' => 'Statistik dan Persandian',
            'no_hp' => '081234567890',
        ]);

        $pembimbing2 = Pembimbing::create([
            'nip' => '199002022015022002',
            'nama' => 'Nafik Anugrah, S.T',
            'jabatan' => 'Staff IT',
            'bidang' => 'Aplikasi dan Informatika (Aptika)',
            'no_hp' => '089876543210',
        ]);

        // 3. BUAT AKUN PESERTA 1 (DIAH - SUDAH DITERIMA & PENEMPATAN)
        $userDiah = User::create([
            'name' => 'Diah Putri',
            'email' => 'diah@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'pemagang',
        ]);

        $pesertaDiah = Peserta::create([
            'user_id' => $userDiah->id,
            'nim_nisn' => '2110010500',
            'nama_lengkap' => 'Diah Putri',
            'institusi' => 'UNISKA Banjarmasin',
            'jurusan' => 'Teknik Informatika',
            'no_hp' => '085811223344',
            'alamat' => 'Jl. Adhyaksa No. 2',
            'tgl_mulai' => '2026-01-01',
            'tgl_selesai' => '2026-03-01',
            'status' => 'aktif', // Status sudah aktif
        ]);

        // Link Diah ke Pembimbing 1 (Pak Rasyidi)
        Penempatan::create([
            'peserta_id' => $pesertaDiah->id,
            'pembimbing_id' => $pembimbing1->id,
            'ruangan' => 'Ruang Server Lt. 2',
            'catatan_khusus' => 'Fokus belajar jaringan dan server.',
        ]);

        // Buat Data Absensi Dummy untuk Diah (5 Hari)
        $this->createAbsensiDummy($pesertaDiah->id);

        // 4. BUAT AKUN PESERTA 2 (BUDI - MASIH PENDING)
        $userBudi = User::create([
            'name' => 'Budi Santoso',
            'email' => 'budi@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'pemagang',
        ]);

        Peserta::create([
            'user_id' => $userBudi->id,
            'nim_nisn' => '2110010600',
            'nama_lengkap' => 'Budi Santoso',
            'institusi' => 'Poliban',
            'jurusan' => 'Sistem Informasi',
            'no_hp' => '085855667788',
            'alamat' => 'Jl. Kayutangi',
            'tgl_mulai' => '2026-02-01',
            'tgl_selesai' => '2026-04-01',
            'status' => 'pending', // Masih menunggu approval admin
        ]);
    }

    /**
     * Helper bikin absensi dummy biar grafik dashboard gak kosong
     */
    private function createAbsensiDummy($pesertaId)
    {
        // Hari 1: Hadir Tepat Waktu
        Absensi::create([
            'peserta_id' => $pesertaId,
            'tgl' => '2026-01-02',
            'jam_masuk' => '08:00:00',
            'jam_keluar' => '16:00:00',
            'status' => 'hadir',
        ]);

        // Hari 2: Hadir
        Absensi::create([
            'peserta_id' => $pesertaId,
            'tgl' => '2026-01-03',
            'jam_masuk' => '07:55:00',
            'jam_keluar' => '16:05:00',
            'status' => 'hadir',
        ]);

        // Hari 3: Izin
        Absensi::create([
            'peserta_id' => $pesertaId,
            'tgl' => '2026-01-04',
            'jam_masuk' => null,
            'jam_keluar' => null,
            'status' => 'izin',
            'keterangan' => 'Mengurus KRS di Kampus',
        ]);

        // Hari 4: Sakit
        Absensi::create([
            'peserta_id' => $pesertaId,
            'tgl' => '2026-01-05',
            'jam_masuk' => null,
            'jam_keluar' => null,
            'status' => 'sakit',
            'keterangan' => 'Demam tinggi',
        ]);
    }
}

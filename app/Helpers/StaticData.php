<?php

namespace App\Helpers;

class StaticData
{
    /**
     * Daftar Semester untuk Dropdown
     */
    public static function getSemesters()
    {
        return [
            12 => 'Kelas 12 SMK',
            4 => 'Semester 4',
            5 => 'Semester 5',
            6 => 'Semester 6',
            7 => 'Semester 7',
            8 => 'Semester 8',
        ];
    }

    /**
     * Daftar Jabatan Struktural & Fungsional Diskominfo
     */
    public static function getJabatan()
    {
        return [
            'Kepala Dinas',
            'Sekretaris Dinas',
            'Kepala Bidang E-Government',
            'Kepala Bidang IKP',
            'Kepala Bidang Statistik & Persandian',
            'Pranata Komputer Ahli Madya',
            'Pranata Komputer Ahli Muda',
            'Pranata Komputer Ahli Pertama',
            'Pranata Komputer Terampil',
            'Pranata Humas Ahli Muda',
            'Analis Sistem Informasi',
            'Pengelola Situs / Web',
            'Teknisi Jaringan',
            'Staf Pelaksana',
        ];
    }
}

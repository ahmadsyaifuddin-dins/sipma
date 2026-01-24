<?php

namespace App\Helpers;

class StaticData
{
    /**
     * Daftar Semester untuk Dropdown
     */
    public static function getSemesters()
    {
        return [4, 5, 6, 7, 8];
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

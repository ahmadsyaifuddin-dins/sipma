<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensi';

    protected $guarded = ['id'];

    // Casting tipe data agar format jam/tanggal enak dipakai
    protected $casts = [
        'tgl' => 'date',
        // jam_masuk & jam_keluar tetap string/time,
        // atau bisa pakai 'datetime:H:i' sesuai selera nanti
    ];

    // RELATIONS

    public function peserta()
    {
        return $this->belongsTo(Peserta::class);
    }
}

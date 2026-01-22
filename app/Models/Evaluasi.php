<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluasi extends Model
{
    use HasFactory;

    protected $table = 'evaluasi';

    protected $guarded = ['id'];

    // RELATIONS

    public function peserta()
    {
        return $this->belongsTo(Peserta::class);
    }

    // Tips: Nanti kita bisa buat Accessor di sini untuk konversi nilai huruf
    // Tapi karena di database sudah kita simpan kolomnya (predikat_huruf),
    // Accessor tidak wajib, kecuali mau hitung on-the-fly.
}

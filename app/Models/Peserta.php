<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $table = 'peserta';

    protected $guarded = ['id'];

    // RELATIONS

    // Milik User siapa?
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 1 Peserta punya 1 Penempatan
    public function penempatan()
    {
        return $this->hasOne(Penempatan::class);
    }

    // 1 Peserta punya BANYAK Absensi
    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }

    // 1 Peserta punya 1 Nilai Akhir (Evaluasi)
    public function evaluasi()
    {
        return $this->hasOne(Evaluasi::class);
    }
}

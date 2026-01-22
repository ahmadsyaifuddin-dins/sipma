<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penempatan extends Model
{
    use HasFactory;

    protected $table = 'penempatan';

    protected $guarded = ['id'];

    // RELATIONS

    // Penempatan ini milik peserta siapa?
    public function peserta()
    {
        return $this->belongsTo(Peserta::class);
    }

    // Penempatan ini dibimbing oleh siapa?
    public function pembimbing()
    {
        return $this->belongsTo(Pembimbing::class);
    }
}

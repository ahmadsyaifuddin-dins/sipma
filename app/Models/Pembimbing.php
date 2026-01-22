<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembimbing extends Model
{
    use HasFactory;

    // Override nama tabel (Singular)
    protected $table = 'pembimbing';

    // Guard id, sisanya boleh diisi massal
    protected $guarded = ['id'];

    // RELATIONS

    // 1 Pembimbing punya banyak data Penempatan (membimbing banyak peserta)
    public function penempatan()
    {
        return $this->hasMany(Penempatan::class);
    }
}

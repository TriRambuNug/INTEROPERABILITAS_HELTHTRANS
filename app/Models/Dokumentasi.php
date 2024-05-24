<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumentasi extends Model
{
    use HasFactory;

    protected $table = 'dokumentasi';
    protected $fillable = [
        'id',
        'pasien_id',
        'petugas_id',
        'diagnosa',
        'tindakan',
        'tanggal',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class);
    }
}

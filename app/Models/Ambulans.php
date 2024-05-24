<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambulans extends Model
{
    use HasFactory;

    protected $table = 'ambulans';
    protected $fillable = [
        'id',
        'petugas_id',
        'rumah_sakit_id',
        'lokasi',
        'tipe',
        'plat_nomor',
        'status',
    ];

    public function petugas()
    {
        return $this->belongsTo(Petugas::class);
    }

    public function rumahSakit()
    {
        return $this->belongsTo(RumahSakit::class);
    }
}

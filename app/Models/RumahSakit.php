<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RumahSakit extends Model
{
    use HasFactory;

    protected $table = 'rumah_sakit';
    protected $fillable = [
        'id',
        'nama',
        'alamat',
        'nomer_telp',
        'email',
    ];

    public function ambulans()
    {
        return $this->hasMany(Ambulans::class);
    }

    public function petugas()
    {
        return $this->hasMany(Petugas::class);
    }

    // public function pasien()
    // {
    //     return $this->hasMany(Pasien::class);
    // }

    // public function dokumentasi()
    // {
    //     return $this->hasMany(Dokumentasi::class);
    // }
}

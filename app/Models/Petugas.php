<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;

    protected $table = 'petugas';
    protected $fillable = [
        'id',
        'nama',
        'jabatan',
        'alamat',
        'no_telp',
        'nip',
    ];

    public function ambulans()
    {
        return $this->hasMany(Ambulans::class);
    }

    public function dokumentasi()
    {
        return $this->hasMany(Dokumentasi::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasien';
    protected $fillable = [
        'id',
        'nama',
        'alamat',
        'no_telp',
        'tanggal_lahir',
        'jenis_kelamin',
        'gol_darah',
        'riwayat_penyakit',
    ];

    public function dokumentasi()
    {
        return $this->hasMany(Dokumentasi::class);
    }
}

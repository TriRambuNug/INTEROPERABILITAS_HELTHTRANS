<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PertolonganPertama extends Model
{
    use HasFactory;

    protected $table = 'pertolongan_pertama';
    protected $fillable = [
        'id',
        'judul',
        'deskripsi',
        'gambar',
    ];

}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Pasien extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'nik' => $this->nik,
            'alamat' => $this->alamat,
            'tanggal_lahir' => $this->tanggal_lahir,
            'jenis_kelamin' => $this->jenis_kelamin,
            'gol_darah' => $this->gol_darah,
            'riwayat_penyakit' => $this->riwayat_penyakit,
            'no_telp' => $this->no_telp,
            'dokumentasi' => Dokumentasi::collection($this->dokumentasi),
        ];
    }
}

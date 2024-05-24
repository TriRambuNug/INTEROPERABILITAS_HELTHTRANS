<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Ambulans extends JsonResource
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
            'petugas_id' => $this->petugas_id,
            'instansi' => $this->instansi,
            'lokasi' => $this->lokasi,
            'tipe' => $this->tipe,
            'plat_nomor' => $this->plat_nomor,
            'status' => $this->status,
            'petugas' => new Petugas($this->petugas),
            'rumah_sakit' => new RumahSakit($this->rumahSakit),
        ];
    }
}

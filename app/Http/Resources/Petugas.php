<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Petugas extends JsonResource
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
            'nip' => $this->nip,
            'alamat' => $this->alamat,
            'jabatan' => $this->jabatan,
            'no_telp' => $this->no_telp,
            'dokumentasi' => Dokumentasi::collection($this->dokumentasi),
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Dokumentasi extends JsonResource
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
            // 'pasien_id' => $this->pasien_id,
            // 'petugas_id' => $this->petugas_id,
            'diagnosa' => $this->diagnosa,
            'tindakan' => $this->tindakan,
            'tanggal' => $this->tanggal,
            'pasien' => $this->pasien,
            'petugas' => $this->petugas,
        ];
    }
}

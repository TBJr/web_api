<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OpinionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'puntuacion'=>$this->puntuacion,
            'comentario'=>$this->comentario,
            // 'fecha'=>'nullable|date_format:Y-m-d',
            'excursion_id'=>$this->excursion_id,
            'client_id'=>$this->client,
            'created_at'=>$this->created_at
        ];
    }
}

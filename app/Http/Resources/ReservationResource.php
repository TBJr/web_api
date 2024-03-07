<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'client'=> $this->client,
            'fecha_reserva'=>$this->fecha_reserva,
            'cantidad_personas'=>$this->cantidad_personas,
            'estado'=> $this->estado,          
            'excursion'=>$this->excursion_id
        ];
    }
}

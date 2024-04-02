<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExcursionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'nombre'=>$this->nombre,
            'descripcion'=>$this->descripcion,
            'fecha_inicio'=> $this->fecha_inicio,
            'hora_salida'=> $this->hora_salida,
            'fecha_fin'=>$this->fecha_fin,
            'hora_regreso'=>$this->hora_regreso,
            'precio_entrada'=>$this->precio_entrada,
            'precio_final'=>$this->precio_final,
            'capacidad_max'=>$this->capacidad_max,
            'opinions' =>OpinionResource::collection($this->opinions),
            'services' =>ServiceResource::collection($this->services),
            'places'=>PlaceResource::collection($this->places),
            'images'=>ImageResource::collection($this->images),
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,

        ];
    }
}

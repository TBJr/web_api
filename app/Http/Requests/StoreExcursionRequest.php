<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExcursionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre'=>'required|string|max:255',
            'descripcion'=>'required|string',
            'fecha_inicio'=> 'required|date_format:Y-m-d',
            'hora_salida'=> 'required|date_format:H:i:s',
            'fecha_fin'=>'required|date_format:Y-m-d',
            'hora_regreso'=>'date_format:H:i:s',
            'precio_entrada'=>'required|decimal:2',
            'precio_final'=>'required|decimal:2',
            'capacidad_max'=>'required|integer'
        ];
    }
}

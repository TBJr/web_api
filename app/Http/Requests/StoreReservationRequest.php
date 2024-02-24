<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
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
            'client_id'=>'required',
            'fecha_reserva'=>'required|date_format:Y-m-d',
            'cantidad_personas'=>'required|integer',
            'estado'=> 'nullable|in:confirmada,pendiente,cancelada',
            'client_id'=>'required',
            'excursion_id'=>'required'
           
            //
        ];
    }
}

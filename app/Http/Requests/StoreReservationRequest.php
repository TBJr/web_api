<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'client_id'=>'required|integer',
            'fecha_reserva'=>'required|date_format:Y-m-d',
            'cantidad_personas'=>'required|integer',
            'estado'=> 'nullable|in:confirmada,pendiente,cancelada',           
            'excursion_id'=>[
                'required|integer',
                Rule::unique('reservations','excursion_id')->where('client_id',$this->input('client_id'))

            ]
           
            //
        ];
    }
    public function messages()
{
    return [
        'excursion_id.unique' => 'A client can only have a reservation for each excursion.',
    ];
}
}

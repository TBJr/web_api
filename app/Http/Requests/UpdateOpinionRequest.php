<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateOpinionRequest extends FormRequest
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
            'puntuacion'=>'required|integer',
            'comentario'=>'required|string',
            // 'fecha'=>'nullable|date_format:Y-m-d',
           
            'client_id'=>'required|integer',
            'excursion_id'=>[
                'required|integer',
                Rule::unique('opnions','excursion_id')->where('client_id',$this->input('client_id'))
            ],
            //
        ];
    }

    public function messages()
    {
        return [
            'excursion_id.unique' => 'A client can only emit one opinion for each excursion.',
        ];
    }
}

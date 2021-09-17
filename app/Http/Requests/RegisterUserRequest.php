<?php

namespace App\Http\Requests;

use App\Models\Preinscripcion_fecha;
use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        return [
            'horarios' => 'required|min:1'
        ];
    }
    public function messages()
    {
        return [
            'horarios.required' => 'Debe seleccionar minimo 1 horario',
        ];
    }
}

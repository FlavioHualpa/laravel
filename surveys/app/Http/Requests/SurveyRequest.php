<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SurveyRequest extends FormRequest
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
            'responses.*.choice_id' => 'required',
            'taker.taker_name' => 'required|string',
            'taker.taker_email' => 'required|email',
        ];
    }

    public function messages()
    {
        return [
            'responses.*.choice_id.required' => 'Debes seleccionar una respuesta',
            'taker.*.required' => 'Debes completar este campo',
            'email' => 'El email ingresado no tiene un formato válido'
        ];
    }

    public function attributes()
    {
        return [
            'responses.*.choice_id' => 'respuesta'
        ];
    }
}

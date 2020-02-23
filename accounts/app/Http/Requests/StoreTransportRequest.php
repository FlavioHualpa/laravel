<?php

namespace App\Http\Requests;

use App\Rules\TransportCodeUniqueRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreTransportRequest extends FormRequest
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
         'code' => [
            'required',
            'min:3',
            'max:12',
            new TransportCodeUniqueRule,
         ],
         'name' => 'required',
         'address.street' => 'required',
         'address.city' => 'required',
         'address.state_id' => 'required|exists:states,id',
         'address.zip' => 'required|integer|between:1000,9999',
      ];
   }

   public function messages()
   {
      return [
         'code.required' => 'El código es obligatorio',
         'code.min' => 'El código debe tener al menos :min caracteres',
         'code.max' => 'El código debe tener como máximo :max caracteres',
         'name.required' => 'El nombre del transporte es obligatorio',
         'address.street.required' => 'La calle es obligatoria',
         'address.city.required' => 'La ciudad es obligatoria',
         'address.state_id.required' => 'Debe seleccionar una provincia',
         'address.state_id.exists' => 'Debe seleccionar una provincia válida',
         'address.zip.required' => 'El código postal es obligatorio',
         'address.zip.integer' => 'El código postal ingresado no es válido',
         'address.zip.between' => 'Debe ingresar un número entre :min y :max',
      ];
   }
}

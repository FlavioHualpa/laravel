<?php

namespace App\Http\Requests;

use App\CustomRules;
use App\Rules\CustomerFieldUniqueRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            new CustomerFieldUniqueRule('code'),
         ],
         'name' => 'required',
         'address.street' => 'required',
         'address.city' => 'required',
         'address.state_id' => 'required|exists:states,id',
         'address.zip' => 'required|integer|between:1000,9999',
         'email' => 'required|email',
         'fiscal_id' => [
            'required',
            'regex:/\d{2}-\d{8}-\d/',
            function ($attribute, $value, $fail) {
               return CustomRules::isValidCUIT($attribute, $value, $fail);
            },
            new CustomerFieldUniqueRule('fiscal_id'),
         ],
         'condition_id' => 'required|exists:conditions,id',
         'status' => 'required',
      ];
   }

   public function messages()
   {
      return [
         'code.required' => 'El código es obligatorio',
         'code.min' => 'El código debe tener al menos :min caracteres',
         'code.max' => 'El código debe tener como máximo :max caracteres',
         'name.required' => 'El nombre del cliente es obligatorio',
         'address.street.required' => 'La calle es obligatoria',
         'address.city.required' => 'La ciudad es obligatoria',
         'address.state_id.required' => 'Debe seleccionar una provincia',
         'address.state_id.exists' => 'Debe seleccionar una provincia válida',
         'address.zip.required' => 'El código postal es obligatorio',
         'address.zip.integer' => 'El código postal ingresado no es válido',
         'address.zip.between' => 'Debe ingresar un número entre :min y :max',
         'email.required' => 'El email del cliente es obligatorio',
         'email.email' => 'El email no tiene un formato válido',
         'fiscal_id.required' => 'El CUIT es obligatorio',
         'fiscal_id.regex' => 'El formato del CUIT debe ser XX-XXXXXXXX-X',
         'condition_id.required' => 'Debe seleccionar una condición',
         'condition_id.exists' => 'Debe seleccionar una condición válida',
         'status.required' => 'Por favor elija una opción',
      ];
   }
}

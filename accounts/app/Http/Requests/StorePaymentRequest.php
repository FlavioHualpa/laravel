<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRequest extends FormRequest
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
         'header.date' => 'required|date',
         'header.customer_id' => 'required|exists:customers,id',
         'header.number' => 'required|integer|gt:0',
         'item.*.payment_method_id' => 'required',
         'item.*.amount' => 'required|numeric|gt:0',
      ];
   }

   public function messages()
   {
      return [
         'header.*.required' => 'Este valor es obligatorio',
         'header.date.date' => 'Debes ingresar una fecha válida',
         'header.customer_id.exists' => 'Debes ingresar un cliente válido',
         'header.number.integer' => 'Debes ingresar un valor numérico',
         'header.number.gt' => 'Debes ingresar un número mayor a cero',
         'item.*.payment_method_id.*' => 'Debes ingresar un método válido',
         'item.*.amount.required' => 'Debes ingresar una valor',
         'item.*.amount.numeric' => 'Debes ingresar un valor numérico',
         'item.*.amount.gt' => 'Debes ingresar un valor numérico mayor a cero',
      ];
   }
}

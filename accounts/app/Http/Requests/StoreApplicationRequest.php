<?php

namespace App\Http\Requests;

use App\Rules\TotalAppliedRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreApplicationRequest extends FormRequest
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
         'header.applicant_id' => 'required',
         'header.applicant_remaining' => new TotalAppliedRule,
         'item.*.invoice_id' => 'required|exists:invoices,id',
         'item.*.amount' => 'required|numeric|gte:0',
      ];
   }

   public function messages()
   {
      return [
         'header.*.required' => 'Este valor es obligatorio',
         'header.date.date' => 'Debes ingresar una fecha válida',
         'header.customer_id.exists' => 'Debes ingresar un cliente válido',
         'header.applicant_id.exists' => 'El comprobante seleccionado no es válido',
         'item.*.invoice_id.*' => 'No se puede aplicar a este comprobante',
         'item.*.amount.required' => 'Debes ingresar una cantidad',
         'item.*.amount.numeric' => 'Debes ingresar un valor numérico',
         'item.*.amount.gte' => 'Debes ingresar un valor numérico mayor o igual a cero',
      ];
   }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceRequest extends FormRequest
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
         'header.invoice_type_id' => 'required|exists:invoice_types,id',
         'header.transport_id' => 'required|exists:transports,id',
         'header.price_list_id' => 'required|exists:price_lists,id',
         'item.*.id' => 'nullable|exists:products,id',
         'item.*.description' => 'required_unless:item.*.id,',
         'item.*.quantity' => 'required_unless:item.*.id,', //|numeric|gt:0',
         'item.*.price' => 'required_unless:item.*.id,', //|numeric|gt:0',
      ];
   }

   public function messages()
   {
      return [
         'header.*.required' => 'Este valor es obligatorio',
         'header.date.date' => 'Debes ingresar una fecha válida',
         'header.customer_id.exists' => 'Debes ingresar un cliente válido',
         'header.invoice_type_id.exists' => 'Debes ingresar un tipo de comprobante válido',
         'header.transport_id.exists' => 'Debes ingresar un transportes válido',
         'header.price_list_id.exists' => 'Debes ingresar una lista de precios válida',
         'item.*.id.*' => 'Debes ingresar un producto válido',
         'item.*.quantity.required' => 'Debes ingresar una cantidad',
         'item.*.quantity.numeric' => 'Debes ingresar un valor numérico',
         'item.*.quantity.gt' => 'Debes ingresar un valor numérico mayor a :min',
         'item.*.price.required' => 'Debes ingresar un precio',
         'item.*.price.numeric' => 'Debes ingresar un valor numérico',
         'item.*.price.gt' => 'Debes ingresar un valor numérico mayor a :min',
      ];
   }
}

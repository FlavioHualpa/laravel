<?php

namespace App\Http\Requests;

use App\PriceList;
use App\Rules\PriceListCodeUniqueRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePriceListRequest extends FormRequest
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
      $price_list = $this->route()->parameters['price_list'];

      return [
         'code' => [
            'required',
            'min:3',
            'max:12',
            new PriceListCodeUniqueRule($price_list),
         ],
         'name' => 'required',
         'products.*.price' => 'required|numeric|gte:0',
         'products.*.product_id' => 'required',
         'company_id' => 'required',
      ];
   }

   public function messages()
   {
      return [
         'code.required' => 'El código es obligatorio',
         'code.min' => 'El código debe tener al menos :min caracteres',
         'code.max' => 'El código debe tener como máximo :max caracteres',
         'name.required' => 'El nombre de la lista de precios es obligatorio',
         'products.*.price.required' => 'Debes ingresar el precio',
         'products.*.price.numeric' => 'El precio debe ser un valor numérico',
         'products.*.price.gte' => 'El precio debe ser un valor numérico mayor a :min',
      ];
   }
}

<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class BookRoomRequest extends FormRequest
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
        /*

        $a = Carbon::createFromTimestamp(strtotime(request()->input('check_in')));
        $b = Carbon::createFromTimestamp(strtotime(request()->input('check_out')));
        $c = Carbon::createFromTimestamp(strtotime(request()->input('check_in') . ' + 60 days'));

        dd(
            $a,
            $b,
            $c,
            $b->diff($c, 'days')
        );

        */

        return [
            'check_in' => 'required|date|after_or_equal:today|before:today + 180 days',

            'check_out' => [
                'required',
                'date',
                'after:check_in',
                function ($attribute, $value, $fail)
                {
                    $checkOutDate = strtotime($value);
                    $maxDate = strtotime(request()->input('check_in') . ' + 60 days');
                    
                    if ($checkOutDate > $maxDate)
                    {
                        $fail('La fecha de egreso no puede ser a más de 60 días de la fecha de ingreso');
                    }
                }
            ],

            'room_type_id' => 'required',
            'passengers' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'check_in.date' => 'La fecha de ingreso no tiene un formato válido',
            'check_in.before' => 'La fecha de ingreso no puede ser a más de 180 días de hoy',
            'check_in.after_or_equal' => 'La fecha de ingreso no puede ser anterior al día de hoy',

            'check_out.date' => 'La fecha de egreso no tiene un formato válido',
            'check_out.before' => 'La fecha de egreso no puede ser a más de 60 días de la fecha de ingreso',
            'check_out.after' => 'La fecha de egreso no puede ser igual o anterior a la fecha de ingreso',

            'required' => 'Este valor es necesario'
        ];
    }
}

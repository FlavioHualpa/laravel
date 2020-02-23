@component('mail::message')
## Gracias por tu reserva {{ $user->fullName() }}

#### Los detalles de tu habitación:

@component('mail::table')
|  |  |
| --- | --- |
| **Habitación:** | {{ $reservData->room_number }} |
| **Pasajeros:** | {{ $reservData->passengers }} |
| **Noches:** | {{ $reservData->nights }} |
| **Importe:** | $ {{ number_format($reservData->total_price, 2, ',', '.') }} |
| **Check-in:** | {{ $reservData->check_in->format('d-m-Y') }} |
| **Check-out:** | {{ $reservData->check_out->format('d-m-Y') }} |
| **Vista:** | {{ $reservData->room_view }} |
@endcomponent

@component('mail::button', ['url' => '{{ route("home") }}'])
Ve tu reserva online
@endcomponent

#### Que tengas una excelente estadía
El equipo del Hotel Harbor Lights
@endcomponent

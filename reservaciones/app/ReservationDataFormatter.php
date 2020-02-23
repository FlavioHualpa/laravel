<?php

namespace App;

use Carbon\Carbon;

class ReservationDataFormatter
{
  public static function checkIn($room)
  {
    $checkIn = Carbon::make($room->pivot->check_in);
    return $checkIn->format('Y-m-d');
  }

  public static function checkOut($room)
  {
    $checkOut = Carbon::make($room->pivot->check_out);
    return $checkOut->format('Y-m-d');
  }

  public static function nights($room)
  {
    $checkIn = Carbon::make($room->pivot->check_in);
    $checkOut = Carbon::make($room->pivot->check_out);

    return $checkIn->diffInDays($checkOut);
  }

  public static function totalPrice($room)
  {
    return '$ ' . number_format(
      self::nights($room) * $room->roomType->price,
      2,
      ',',
      '.'
    );
  }

  public static function invoiceUrl($room)
  {
    $invoice = Invoice::find($room->pivot->invoice_id);

    return public_path(
      'pdf/hhl-invoice-' . $invoice->branch . '-' . $invoice->number . '.pdf'
    );
  }
}

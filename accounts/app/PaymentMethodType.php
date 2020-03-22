<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentMethodType extends Model
{
   protected $fillable = [
      'code'
   ];

   public function payment_methods()
   {
      return $this->hasMany(PaymentMethod::class);
   }
}

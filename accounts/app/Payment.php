<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
   protected $fillable = [
      'customer_id',
      'number',
   ];

   public function customer()
   {
      return $this->belongsTo(Customer::class);
   }

   public function payment_methods()
   {
      return $this->belongsToMany(PaymentMethod::class)
                  ->withPivot([ 'amount', 'comment', 'details' ])
                  ->withTimeStamps()
                  ->as('item');
   }

   public function value($pm)
   {
      if ($pm instanceof PaymentMethod)
         return $pm->item;
      
      if ($pm instanceof integer)
         return $this->payment_methods[$pm]->item;

      return null;
   }
}

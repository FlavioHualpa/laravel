<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
   protected $fillable = [
      'customer_id',
      'number',
   ];

   protected $casts = [
      'item.details' => 'array',
      'details' => 'array'
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

   public function payment_applications()
   {
      return $this->morphToMany(Invoice::class, 'applicant', 'invoice_payment')
                  ->withPivot([ 'amount' ])
                  ->withTimeStamps()
                  ->as('payment_application');
   }

   public function value($pm)
   {
      if ($pm instanceof PaymentMethod)
         return $pm->item;
      
      if (is_int($pm))
         return $this->payment_methods[$pm]->item;

      return null;
   }

   public function total()
   {
      return $this->payment_methods()->sum('amount');

      return self::join('payment_payment_method',
                     'payment_id', 'payments.id')
                  ->where('payments.id', $this->id)
                  ->sum('amount');
   }

   public function total_applied()
   {
      return $this->payment_applications()->sum('amount');
   }

   public function remaining_to_apply()
   {
      return $this->total() - $this->total_applied();
   }
}

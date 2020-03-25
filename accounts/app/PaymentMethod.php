<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
   protected $fillable = [
      'company_id',
      'code',
      'name',
   ];

   protected $casts = [
      'item.details' => 'array',
      'details' => 'array'
   ];

   public function company()
   {
      return $this->belongsTo(Company::class);
   }

   public function payment_method_type()
   {
      return $this->belongsTo(PaymentMethodType::class);
   }

   public function payments()
   {
      return $this->belongsToMany(Payment::class)
                  ->withPivot([ 'amount', 'comment', 'details' ])
                  ->withTimeStamps()
                  ->as('item');
   }

   public function scopeOrderedByName($query)
   {
      if ($company_id = session()->get('active_company')->id)
      {
         return $query->orderBy('name')
                     ->where('company_id', $company_id);
      }
   }
}

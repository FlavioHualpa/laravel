<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
   protected $fillable = [
      'account_id',
      'code',
      'name',
      'tax',
   ];

   public function account()
   {
      return $this->belongsTo(Account::class);
   }
   
   public function customers()
   {
      return $this->hasMany(Customer::class);
   }
   
   public function invoice_types()
   {
      return $this->hasMany(InvoiceType::class);
   }

   public function scopeOrderedByName($query)
   {
      $account_id = auth('admin')->id();

      return $query->orderBy('name')->where('account_id', $account_id);
   }
}

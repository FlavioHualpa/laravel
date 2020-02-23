<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
   protected $fillable = [
      'company_id',
      'customer_id',
      'transport_id',
      'price_list_id',
      'price_list_id',
      'number',
   ];

   public function __construct($invoice_type_id)
   {
      $last_number = self::max('number')
                              ->where(
                                 'company_id',
                                 session('active_company')->id
                              )->where(
                                 'invoice_type',
                                 $invoice_type_id
                              )-get();
      
      $last_number = $last_number ? $last_number + 1 : 1;
   }

   public function company()
   {
      return $this->belongsTo(Company::class);
   }

   public function customer()
   {
      return $this->belongsTo(Customer::class);
   }

   public function transport()
   {
      return $this->belongsTo(Transport::class);
   }

   public function price_list()
   {
      return $this->belongsTo(PriceList::class);
   }

   public function products()
   {
      return $this->belongsToMany(Product::class)
                  ->withPivot([ 'description', 'quantity', 'price' ]);
   }
}

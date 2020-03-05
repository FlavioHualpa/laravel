<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
   protected $fillable = [
      'company_id',
      'customer_id',
      'invoice_type_id',
      'transport_id',
      'price_list_id',
      'number',
   ];

   public function get_next_number($invoice_type_id)
   {
      $last_number = self::where(
                              'company_id',
                              session('active_company')->id
                           )
                           ->where(
                              'invoice_type_id',
                              $invoice_type_id
                           )
                           ->max('number');
      
      $next_number = $last_number ? $last_number + 1 : 1;
      $this->number = $next_number;
      $this->invoice_type_id = $invoice_type_id;
   }

   public function company()
   {
      return $this->belongsTo(Company::class);
   }

   public function customer()
   {
      return $this->belongsTo(Customer::class);
   }

   public function invoice_type()
   {
      return $this->belongsTo(InvoiceType::class);
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
                  ->withPivot([ 'description', 'quantity', 'price' ])
                  ->withTimeStamps()
                  ->as('item');
   }

   public function final_amount()
   {
      return $this->products->sum(
         function ($product) {
            return $product->item->price * $product->item->quantity;
         }
      );
   }

   public function final_tax()
   {
      return $this->final_amount() * $this->customer->condition->final_tax;
   }

   public function final_amount_with_tax()
   {
      return $this->final_amount() *
         (1.0 + $this->customer->condition->final_tax);
   }
}

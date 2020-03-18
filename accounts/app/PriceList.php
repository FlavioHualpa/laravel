<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriceList extends Model
{
   protected $fillable = [
      'code',
      'name',
      'company_id',
   ];

   public function company()
   {
      return $this->belongsTo(Company::class);
   }

   public function products()
   {
      return $this->belongsToMany(Product::class)
                  ->withPivot([ 'price' ])
                  ->withTimeStamps()
                  ->as('price_list');
   }

   public static function filteredAndSorted($filter, $show, $order, $dir)
   {
      $company_id = session()->get('active_company')->id;

      $query = self::when($filter, function($query, $filter) {
         return $query->where('code', 'like', "%$filter%")
                     ->orWhere('name', 'like', "%$filter%");
         })->where('company_id', $company_id)
            ->orderBy($order, $dir);

      return $query;
   }

   public function scopeOrderedByName($query)
   {
      if ($company_id = session()->get('active_company')->id)
      {
         return $query->orderBy('name')->where('company_id', $company_id);
      }
   }

   public function priceOfProduct($product_id)
   {
      $product = $this->products->find($product_id);
      
      return $product ? $product->price_list->price : 0.0;
   }
}

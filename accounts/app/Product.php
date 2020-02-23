<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   const STATUS_ACTIVE = 0;
   const STATUS_SUSPENDED = 1;
   const STATUS_DISCONTINUED = 2;

   use StatusField;
   
   protected $fillable = [
      'code',
      'description',
      'company_id',
      'status',
   ];

   protected $attributes = [
      'status' => self::STATUS_ACTIVE,
   ];
   
   public function image()
   {
      return $this->morphOne(Image::class, 'imageable');
   }

   public function company()
   {
      return $this->belongsTo(Company::class);
   }

   public function price_lists()
   {
      return $this->belongsToMany(PriceList::class);
   }

   public function invoices()
   {
      return $this->belongsToMany(Invoice::class)
                  ->withPivot([ 'description', 'quantity', 'price' ]);
   }

   public static function withFilters($filter, $show)
   {
      $statusValues = [ self::STATUS_ACTIVE ];
      $company_id = session()->get('active_company')->id;

      if ($show)
      {
         if (array_search('sus', $show) !== FALSE)
            $statusValues[] = self::STATUS_SUSPENDED;

         if (array_search('dis', $show) !== FALSE)
            $statusValues[] = self::STATUS_DISCONTINUED;
      }

      return self::when($filter, function($query, $filter) {
         
         return $query->where('code', 'like', "%$filter%")
                     ->orWhere('description', 'like', "%$filter%");
         
      })->whereIn('status', $statusValues)
         ->where('company_id', $company_id);
   }

   public function scopeOrderedByCode($query)
   {
      if ($company_id = session()->get('active_company')->id)
      {
         return $query->orderBy('code')->where('company_id', $company_id);
      }
   }
}

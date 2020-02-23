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
      return $this->belongsToMany(Product::class);
   }

   public function scopeOrderedByName($query)
   {
      if ($company_id = session()->get('active_company')->id)
      {
         return $query->orderBy('name')->where('company_id', $company_id);
      }
   }
}

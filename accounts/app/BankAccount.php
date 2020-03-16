<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
   protected $fillable = [
      'company_id',
      'bank_id',
      'code',
      'name',
      'number',
   ];

   public function bank()
   {
      return $this->belongsTo(Bank::class);
   }

   public function company()
   {
      return $this->belongsTo(Company::class);
   }

   public function scopeOrderedByName($query)
   {
      $company_id = session()->get('active_company')->id;

      return $query->orderBy('name')
                  ->where('company_id', $company_id);
   }

   public static function filteredAndSorted($filter, $show, $order, $dir)
   {
      $company_id = session()->get('active_company')->id;

      $query = self::when($filter, function($query, $filter) {
         return $query->where('code', 'like', "%$filter%")
                     ->orWhere('name', 'like', "%$filter%")
                     ->orWhere('number', 'like', "%$filter%");
            })->where('company_id', $company_id)
               ->orderBy($order, $dir);

      return $query;
   }
}

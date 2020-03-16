<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
   protected $fillable = [
      'account_id',
      'code',
      'name',
   ];

   public function account()
   {
      return $this->belongsTo(Account::class);
   }

   public function bank_accounts()
   {
      return $this->hasMany(BankAccount::class);
   }

   public function scopeOrderedByName($query)
   {
      $account_id = auth()->user()->account->id;

      return $query->orderBy('name')
                  ->where('account_id', $account_id);
   }

   public static function filteredAndSorted($filter, $show, $order, $dir)
   {
      $account_id = auth()->user()->account->id;

      $query = self::when($filter, function($query, $filter) {
         return $query->where('code', 'like', "%$filter%")
                     ->orWhere('name', 'like', "%$filter%");
         })->where('account_id', $account_id)
            ->orderBy($order, $dir);

      return $query;
   }
}

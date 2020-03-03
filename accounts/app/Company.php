<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
   protected $casts = [
      'address' => 'array',
      'phone' => 'array',
   ];
   
   protected $fillable = [
      'code',
      'name',
      'address',
      'phone',
      'email',
      'fiscal_id',
      'condition_id',
      'account_id',
   ];

   public function condition()
   {
      return $this->belongsTo(Condition::class);
   }

   public function state()
   {
      return $this->belongsTo(State::class, 'address["state_id"]');
   }

   public function account()
   {
      return $this->belongsTo(Account::class);
   }

   public function customers()
   {
      return $this->hasMany(Customer::class);
   }

   public function products()
   {
      return $this->hasMany(Product::class);
   }

   public function transports()
   {
      return $this->hasMany(Transport::class);
   }

   public function price_lists()
   {
      return $this->hasMany(PriceList::class);
   }

   public function invoices()
   {
      return $this->hasMany(Invoice::class);
   }

   public function getFullAddressAttribute()
   {
      $street = $this->address['street'];
      $door = isset($this->address['door']) ? ' ' . $this->address['door'] : '';
      $floor = isset($this->address['floor']) ? ', ' . $this->address['floor'] : '';
      $apartment = isset($this->address['apartment']) ? ' ' . $this->address['apartment'] : '';
      $city = isset($this->address['city']) ? ', ' . $this->address['city'] : '';

      $full_address =  $street . $door . $floor . $apartment . $city;

      return $full_address;
   }

   public static function customOrderBy($order, $dir)
   {
      $account_id = auth('admin')->id();

      if (strpos($order, "."))
      {
         $col = explode(".", $order);
         $query = self::orderByRaw(
            "json_extract($col[0], \"$.$col[1]\") $dir"
         );
      }
      else
      {
         $query = self::orderBy($order, $dir);
      }

      return $query->where('account_id', $account_id);
   }
}

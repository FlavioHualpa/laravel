<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
   protected $casts = [
      'address' => 'array',
      'phone' => 'array',
   ];
   
   protected $fillable = [
      'account_id',
      'code',
      'name',
      'address',
      'phone',
   ];

   public function company()
   {
      return $this->belongsTo(Company::class);
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

   public function scopeOrderedByName($query)
   {
      if ($account_id = auth('admin')->id())
      {
         return $query->orderBy('name')->where('account_id', $account_id);
      }
   }
}

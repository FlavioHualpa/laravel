<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
   const STATUS_ACTIVE = 0;
   const STATUS_SUSPENDED = 1;
   const STATUS_DISCONTINUED = 2;

   use StatusField;
   
   protected $casts = [
      'address' => 'array',
      'phone' => 'array',
      'birth' => 'date',
   ];
   
   protected $fillable = [
      'code',
      'name',
      'address',
      'phone',
      'email',
      'fiscal_id',
      'condition_id',
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

   public function condition()
   {
      return $this->belongsTo(Condition::class);
   }

   public function company()
   {
      return $this->belongsTo(Company::class);
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
                     ->orWhere('name', 'like', "%$filter%");
         
      })->whereIn('status', $statusValues)
         ->where('company_id', $company_id);
   }

   public function scopeOrderedByName($query)
   {
      if ($company_id = session()->get('active_company')->id)
      {
         return $query->orderBy('name')->where('company_id', $company_id);
      }
   }
}

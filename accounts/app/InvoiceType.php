<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceType extends Model
{
   protected $fillable = [
      'condition_id',
      'name',
      'letter',
      'balance',
   ];

   public function condition()
   {
      return $this->belongsTo(Condition::class);
   }
}

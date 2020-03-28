<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
   protected $table = 'invoice_payment';

   protected $fillable = [
      'invoice_id',
      'applicant_id',
      'applicant_type',
      'amount',
   ];

   public function payments()
   {
      return $this->morphedByMany(Payment::class, 'applicant');
   }
}

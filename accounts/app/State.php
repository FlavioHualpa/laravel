<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
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
}

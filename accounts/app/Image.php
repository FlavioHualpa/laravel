<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
   protected $fillable = [
      'url',
   ];
   
   // public function customer()
   // {
   //    return $this->morphTo('imageable');
   // }
   
   // public function product()
   // {
   //    return $this->morphTo('img');
   // }
   
   public function imageable()
   {
      return $this->morphTo();
   }
}

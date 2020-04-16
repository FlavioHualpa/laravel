<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
   protected $fillable = [
      'name',
      'code',
   ];

   public function tweets()
   {
      return $this->morphedByMany(Tweet::class, 'reactable', 'reaction_tweet')
         ->withPivot('user_id')
         ->withTimeStamps();
   }
}

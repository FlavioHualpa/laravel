<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
   protected $fillable = [
      'user_id',
      'text',
   ];

   public function user()
   {
      return $this->belongsTo(User::class);
   }

   public function reactions()
   {
      return $this->morphToMany(Reaction::class, 'reactable', 'reaction_tweet')
         ->withPivot('user_id')
         ->withTimeStamps();
   }

   public function grouped_reactions()
   {
      return $this->morphToMany(Reaction::class, 'reactable', 'reaction_tweet')
         ->select('name', 'emoji', \DB::raw('count(name) AS count'))
         ->groupBy('name', 'emoji', 'pivot_reactable_id', 'pivot_reactable_type', 'pivot_reaction_id');
   }
}

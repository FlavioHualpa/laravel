<?php

use App\Reaction;
use App\Tweet;
use App\User;
use Illuminate\Database\Seeder;

class ReactionTweetTableSeeder extends Seeder
{
   /**
   * Run the database seeds.
   *
   * @return void
   */
   public function run()
   {
      $tweets = Tweet::all();
      $reactions = Reaction::all();
      
      foreach ($tweets as $tweet)
      {
         $number = rand(0, min(8, $tweet->user->followed_by()->count()));
         $users = $tweet->user->followed_by->random($number);
         
         foreach ($users as $user)
         {
            $reaction = $reactions->random();
            $tweet->reactions()->attach(
               $reaction, [
                  'user_id' => $user->id,
               ]
            );
         }
      }
   }
}

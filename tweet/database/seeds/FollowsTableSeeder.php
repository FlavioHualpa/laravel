<?php

use App\User;
use Illuminate\Database\Seeder;

class FollowsTableSeeder extends Seeder
{
   /**
   * Run the database seeds.
   *
   * @return void
   */
   public function run()
   {
      $users = User::all();

      foreach ($users as $user)
      {
         $number = rand(1, 10);
         $follows = $users->random($number);
         foreach ($follows as $follow)
            if ($follow->id != $user->id)
               $user->follows()->attach($follow);
      }
   }
}

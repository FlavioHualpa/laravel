<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tweet;
use App\User;
use Faker\Generator as Faker;

$factory->define(Tweet::class, function (Faker $faker) {

   $users = User::all();
   $datetime = now()->addSeconds(rand(-86000, 86000));

   return [
      'user_id' => $users->random()->id,
      'text' => $faker->sentence,
      'created_at' => $datetime,
      'updated_at' => $datetime,
   ];

});

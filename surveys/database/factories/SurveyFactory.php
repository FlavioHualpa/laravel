<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Survey;
use Faker\Generator as Faker;

$factory->define(Survey::class, function (Faker $faker) {
   return [
      'questionnaire_id' => 2,
      'taker_name' => $faker->firstName,
      'taker_email' => $faker->unique()->safeEmail
   ];
});

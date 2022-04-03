<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AffiliateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_names' => $this->faker->firstName(),
            'last_names' => $this->faker->lastName(),
            'dni' => rand(20000000, 50000000),
            'birth_date' => Carbon::create(rand(2010, 2020), rand(1, 12), rand(1, 28)),
            'telephone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->email(),
            'password' => Hash::make('password')
        ];
    }
}

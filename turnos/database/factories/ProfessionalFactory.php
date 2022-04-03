<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProfessionalFactory extends Factory
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
            'license_number' => rand(10490261, 99999999),
        ];
    }
}

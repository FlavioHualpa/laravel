<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MedicalCenterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'address' => $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'state' => 'Provincia',
            'zip_code' => rand(1001, 5999),
            'telephone' => $this->faker->phoneNumber(),
        ];
    }
}

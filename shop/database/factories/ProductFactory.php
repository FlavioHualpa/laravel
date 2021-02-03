<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->ean13,
            'name' => $this->faker->sentence(3, false),
            'photo' => 'https://picsum.photos/300/200?' . Str::random(12),
            'price' => rand(10, 499) + rand(0, 19) * 0.05,
        ];
    }
}

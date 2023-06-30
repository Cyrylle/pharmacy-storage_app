<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Drinkable>
 */
class DrinkableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->randomElement([1,2,3,4,5,6,7,8,9,10]),
            'name' => fake()->randomElement(['natures spring','growee','cherifer','absolute']),
            'size' => fake()->randomElement(['10liter','15ml','1liter','2liter','40ml']),
            'brand' => fake()->randomElement(['unilab','ritemed']),
            'price' => fake()->numberBetween(10,50),
            'quantity' => fake()->numberBetween(100, 200),
        ];
    }
}

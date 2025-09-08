<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sku>
 */
class SkuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'product_id' => Product::factory(),
        'name' =>Product::factory(),
        'price' => fake()->randomFloat(2, 10, 1000),
        'quantity' => fake()->randomDigit()
        ];
    }
}

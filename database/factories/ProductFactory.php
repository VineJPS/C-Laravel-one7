<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Brand;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'brand_id' =>Brand::factory(),
            'category_id' => Category::factory(),
            'name' => fake()->word(),
            'slug' => fake()->slug(),
            'description' => fake()->text(maxNbChars: 1000),
            'is_featured' => fake()->boolean()
        ];
    }
}

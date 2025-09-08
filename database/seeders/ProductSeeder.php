<?php

namespace Database\Seeders;

use Database\Factories\ProductFactory;
use Database\Factories\SkuFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Sku;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()
            ->has(Sku::factory()
                ->hasImages(5)
                ->count(3)
            )->count(50)
             ->create();

    }
}

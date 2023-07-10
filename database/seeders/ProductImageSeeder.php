<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();
        $productValues = include('database/Helpers/ProductNamesSeeder.php');

        foreach ($products as $product) {
            $hasImage = rand(0, 1);
            if ($hasImage === 1) {
                ProductImage::factory()
                    ->count(rand(1, 3))
                    ->state([
                        'product_id' => $product->id,
                        'image' => $productValues[rand(0, count($productValues) - 1)]['image']
                    ])
                    ->create();
            }
        }
    }
}

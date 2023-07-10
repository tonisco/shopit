<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public $products = [];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productValues = include('database/Helpers/ProductNamesSeeder.php');

        $vendors = Vendor::all();
        $categories_and_sub = Category::with('subCategories')->get();
        $brands = Brand::all();

        foreach ($productValues as $product) {
            $category = $categories_and_sub[rand(0, count($categories_and_sub) - 1)];
            $subCategories = $category->subCategories;
            $subCategoryId = count($subCategories) === 0 ? null : $subCategories[rand(0, count($subCategories) - 1)]->id;

            Product::factory()
                ->state([
                    'name' => $product['name'],
                    'slug' => Str::slug($product['name']),
                    'image' => $product['image'],
                    'vendor_id' => $vendors[rand(0, count($vendors) - 1)]->id,
                    'category_id' => $category->id,
                    'sub_category_id' => $subCategoryId,
                    'brand_id' => $brands[rand(1, count($brands) - 1)]->id,
                ])
                ->create();
        }
    }
}

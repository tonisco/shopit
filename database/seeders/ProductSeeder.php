<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public $products = [];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vendors = Vendor::all();
        $categories_and_sub = Category::with('subCategories')->get();
        $brands = Brand::all();

        foreach ($vendors as $vendor) {
            foreach ($categories_and_sub as $category) {
                foreach ($category->subCategories as $sub_category) {
                    Product::factory()
                        ->state([
                            'vendor_id' => $vendor->id,
                            'category_id' => $category->id,
                            'sub_category_id' => $sub_category->id,
                            'brand_id' => $brands[rand(1, count($brands) - 1)]->id,
                        ])
                        ->create();
                }
            }
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductReview;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $products = Product::with('vendor')->get();

        foreach ($products as $product) {
            foreach ($users as $user) {
                $shouldComment = rand(0, 1);
                if ($shouldComment === 1 && $user->id !== $product->vendor->user_id) {
                    ProductReview::factory()
                        ->state(['user_id' => $user->id, 'product_id' => $product->id])
                        ->create();
                }
            }
        }
    }
}

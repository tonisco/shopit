<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WishlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();
        $users = User::all();

        foreach ($users as $user) {
            Wishlist::factory()
                ->count(rand(1, 6))
                ->state(['user_id' => $user->id, 'product_id' => $products[rand(0, count($products) - 1)]])
                ->create();
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\ShippingMethod;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $shipping_methods = ShippingMethod::all();

        foreach ($users as $user) {
            Order::factory()
                ->count(rand(1, 3))
                ->state(['user_id' => $user->id, 'shipping_method_id' => $shipping_methods[rand(0, count($shipping_methods) - 1)]])
                ->create();
        }
    }
}

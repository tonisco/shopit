<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    // public $payment_methods=['cash', 'p'];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status' => 'delivered',
            'address' => fake()->address(),
            'sub_total' => 0,
            'total' => 0,
            'payment_method' => 'paystack',
            'payment_status' => 'paid',
            'product_qty' => rand(1, 9),
            'user_id' => 1,
            'shipping_method_id' => 1,
            'coupon_id' => null,
        ];
    }
}

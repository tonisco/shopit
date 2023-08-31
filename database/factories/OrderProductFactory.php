<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderProduct>
 */
class OrderProductFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'product_name' => fake()->name(),
			'variants' => null,
			"product_image" => '',
			'price' => 1,
			'qty' => 1,
			'total' => 1,
			'order_id' => 1,
			'product_id' => 1,
			'vendor_id' => 1
		];
	}
}

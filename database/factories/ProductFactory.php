<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
			'name' => fake()->name(),
			'slug' => fake()->name(),
			'image' => fake()->imageUrl(),
			'qty' => rand(10, 20),
			'price' => rand(1, 50) * 10,
			'short_description' => fake()->sentence(),
			'long_description' => fake()->paragraph(),
			'vendor_id' => 1,
			'discount' => rand(0, 1),
			'discount_start_date' => fake()->date(),
			'discount_end_date' => fake()->date(),
			'category_id' => 1,
			'sub_category_id' => 1,
			'brand_id' => 1,
			'approved' => 1,
			'status' => 1,
		];
	}
}

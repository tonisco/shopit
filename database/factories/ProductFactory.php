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
		$date1 = fake()->dateTimeThisYear('+6 months');
		$date2 = fake()->dateTimeThisYear('+6 months');

		if ($date1 > $date2) {
			$start = $date2;
			$end = $date1;
		} else {
			$start = $date1;
			$end = $date2;
		}
		$discount = rand(1, 5) * 10;


		return [
			'name' => fake()->name(),
			'slug' => fake()->name(),
			'image' => fake()->imageUrl(),
			'qty' => rand(10, 20),
			'price' => rand(1, 50) * 10,
			'short_description' => fake()->sentence(),
			'long_description' => fake()->paragraph(),
			'vendor_id' => 1,
			'discount' => $discount,
			'discount_start_date' => $start,
			'discount_end_date' => $end,
			'category_id' => 1,
			'sub_category_id' => 1,
			'brand_id' => 1,
			'approved' => 'approved',
			'status' => 1,
		];
	}
}

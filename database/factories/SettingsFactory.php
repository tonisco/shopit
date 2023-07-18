<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingsFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		// TODO: get logo image
		return [
			'site_name' => 'Shopit',
			'email' => 'customer@shopit.com',
			'phone' => '+01-342848320',
			'map_url' => 'https://www.google.com/maps/place/Lagos/@6.5480551,3.2839596,11z/data=!3m1!4b1!4m6!3m5!1s0x103b8b2ae68280c1:0xdc9e87a367c3d9cb!8m2!3d6.5243793!4d3.3792057!16zL20vMGxuZnk?entry=ttu',
			'logo' => fake()->imageUrl(),
		];
	}
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vendor>
 */
class VendorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'image' => fake()->imageUrl(),
            'email' => fake()->unique()->companyEmail(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'description' => fake()->paragraph(),
            'fb_link' => 'https://facebook.com',
            'tw_link' => 'https://twitter.com',
            'insta_link' => 'https://instagram.com',
            'user_id' => 1
        ];
    }
}

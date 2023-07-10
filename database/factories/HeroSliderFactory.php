<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HeroSlider>
 */
class HeroSliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => fake()->imageUrl(),
            'position' => fake()->imageUrl(),
            'title' => fake()->imageUrl(),
            'top_text' => null,
            'bottom_text' => null,
            'status' => 1,
            'btn_url' => '',
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ShippingMethod>
 */
class ShippingMethodFactory extends Factory
{
    public static $counter = 0;
    public $methods = [
        [
            'name' => 'outlier delivery',
            'cost' => 10,
            'delivery_time' => '5 to 10 days',
        ],
        [
            'name' => 'express delivery',
            'cost' => 20,
            'delivery_time' => '2 to 5 days',
        ],
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $method = $this->methods[$this::$counter];
        $this::$counter += 1;

        return [
            'name' => $method['name'],
            'cost' => $method['cost'],
            'delivery_time' => $method['delivery_time'],
            'image' => fake()->imageUrl(),
        ];
    }
}

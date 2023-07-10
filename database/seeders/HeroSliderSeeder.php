<?php

namespace Database\Seeders;

use App\Models\HeroSlider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeroSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $heroValues = include('database/Helpers/HeroNamesSeeder.php');

        foreach ($heroValues as $hero) {

            HeroSlider::factory()
                ->state([
                    'image' => $hero['image'],
                    'position' => $hero['position'],
                    'title' => $hero['title'],
                    'top_text' => $hero['top_text'],
                    'bottom_text' => $hero['bottom_text'],
                    'btn_url' => $hero['btn_url'],
                ])
                ->create();
        }
    }
}

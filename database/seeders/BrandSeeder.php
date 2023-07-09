<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    public $brands = [
        'Chanel',
        'Gucci',
        'Louis Vuitton',
        'Fendi',
        'Zara',
        'Adidas',
        'Nike',
        'Samsung',
        'Iphone',
        'Redmi'
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::factory()
            ->count(count($this->brands))
            ->state(new Sequence(fn (Sequence $i) => ['name' => $this->brands[$i->index]]))
            ->create();
    }
}

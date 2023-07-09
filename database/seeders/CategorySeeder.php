<?php

namespace Database\Seeders;

use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public $category = ['Men', 'Women', 'Children', "Electronics", "Health and Beauty",];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()
            ->count(count($this->category))
            ->state(new Sequence(fn (Sequence $i) => ['name' => $this->category[$i->index]]))
            ->create();
    }
}

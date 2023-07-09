<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    public $category_data = [
        'Men' => ['Clothing', 'Shoes', 'Accessories'],
        'Women' =>  ['Clothing', 'Shoes', 'Accessories'],
        'Children' =>  ['Clothing', 'Shoes', 'Accessories'],
        "Electronics" => ['Camera', 'Laptop', 'Smart Phones'],
        "Health and Beauty" => []
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();

        foreach ($categories as $category) {
            $sub_cat = $this->category_data[$category->name];

            if (count($sub_cat) > 0)
                SubCategory::factory()
                    ->count(count($sub_cat))
                    ->state(new Sequence(fn (Sequence $i) => ['name' => $sub_cat[$i->index], 'category_id' => $category->id]))
                    ->create();
        }
    }
}

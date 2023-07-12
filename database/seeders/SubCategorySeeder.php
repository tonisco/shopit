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
		'Men' => [
			['name' => 'Clothing', 'image' => 'icon/suit.svg'],
			['name' => 'Shoes', 'image' => 'icon/leather-shoe.svg'],
			['name' => 'Accessories', 'image' => 'icon/hand-watch.svg']
		],
		'Women' =>  [
			['name' => 'Clothing', 'image' => 'icon/dress.svg'],
			['name' => 'Shoes', 'image' => 'icon/high-heels.svg'],
			['name' => 'Accessories', 'image' => 'icon/necklace.svg']
		],
		'Children' =>  [
			['name' => 'Clothing', 'image' => 'icon/baby-clothes.svg'],
			['name' => 'Shoes', 'image' => 'icon/shoe.svg'],
			['name' => 'Toys', 'image' => 'icon/teddy-bear.svg']
		],
		"Electronics" => [
			['name' => 'Camera', 'image' => 'icon/camera.svg'],
			['name' => 'Laptop', 'image' => 'icon/laptop.svg'],
			['name' => 'Smart Phones', 'image' => 'icon/smartphone.svg'],
			['name' => 'Accessories', 'image' => 'icon/gadget.svg']
		],
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
					->state(new Sequence(fn (Sequence $i) => [
						'name' => $sub_cat[$i->index]['name'],
						'image' => $sub_cat[$i->index]['image'],
						'category_id' => $category->id
					]))
					->create();
		}
	}
}

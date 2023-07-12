<?php

namespace Database\Seeders;

use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
	public $category = [
		['name' => 'Men', 'image' => 'icon/man.svg'],
		['name' => 'Women', 'image' => 'icon/woman.svg'],
		['name' => 'Children', 'image' => 'icon/children.svg'],
		['name' => "Electronics", 'image' => 'icon/electronics.svg'],
		['name' => "Health and Beauty", 'image' => 'icon/mortar.svg',]
	];
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		Category::factory()
			->count(count($this->category))
			->state(new Sequence(fn (Sequence $i) => [
				'name' => $this->category[$i->index]['name'],
				'image' => $this->category[$i->index]['image']
			]))
			->create();
	}
}

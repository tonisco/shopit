<?php

namespace Database\Seeders;

use App\Models\BreadcrumbsImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BreadcrumbsImageSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		BreadcrumbsImage::factory()->create();
	}
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 */
	public function run(): void
	{

		$this->call([
			UserSeeder::class,
			VendorSeeder::class,
			CategorySeeder::class,
			SubCategorySeeder::class,
			BrandSeeder::class,
			ProductSeeder::class,
			ProductImageSeeder::class,
			UserAddressSeeder::class,
			ProductReviewSeeder::class,
			ShippingMethodSeeder::class,
			OrderSeeder::class,
			OrderProductSeeder::class,
			WishlistSeeder::class,
			TransactionSeeder::class,
			HeroSliderSeeder::class,
			BreadcrumbsImageSeeder::class,
			SettingsSeeder::class,
		]);
	}
}

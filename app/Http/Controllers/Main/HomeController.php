<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\HeroSlider;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function index()
	{
		$sliders = HeroSlider::where('status', true)->orderBy('position', 'asc')->get();

		$products = Product::with('category:id,name', 'subCategory:id,name')->paginate(10);

		// get product rating and total reviews
		foreach ($products as $product) {
			$reviews = $product->productReviews();
			$product->ratings = round($reviews->avg('rating'), 1);
			$product->total_reviews = $reviews->count();
		}

		return view('main.index', compact('sliders', 'products'));
	}
}

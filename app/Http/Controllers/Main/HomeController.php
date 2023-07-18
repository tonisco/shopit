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

		$products = Product::with('category:id,name', 'subCategory:id,name')
			->withCount('productReviews')
			->withAvg('productReviews', 'rating')
			->paginate(10);

		return view('main.index', compact('sliders', 'products'));
	}
}

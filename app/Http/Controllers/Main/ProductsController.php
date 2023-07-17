<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
	public function index(Request $request)
	{

		$categories = Category::with([
			'subCategories' => function ($query) {
				$query->where('status', 1);
			},
		])
			->where('status', true)
			->get();

		$products = Product::with('category:id,name', 'subCategory:id,name')->paginate(9);

		$brands = Brand::all();

		// get product rating and total reviews
		foreach ($products as $product) {
			$reviews = $product->productReviews();
			$product->ratings = round($reviews->avg('rating'), 1);
			$product->total_reviews = $reviews->count();
		}

		return view('main.products', compact('products', 'categories', 'brands'));
	}
	public function detail(string $id)
	{
		$product = Product::with('vendor', 'productReviews')->where('id', $id)->first();

		$product->ratings = round($product->productReviews->avg('rating'), 1);
		$product->total_reviews = $product->productReviews->count();

		return view('main.productDetails', compact('product'));
	}
}

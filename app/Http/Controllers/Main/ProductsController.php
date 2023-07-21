<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
	public function index(Request $request)
	{
		// TODO: implement filter

		$categories = Category::with([
			'subCategories' => function ($query) {
				$query->where('status', 1);
			},
		])
			->where('status', true)
			->get();

		$products = Product::with('category:id,name', 'subCategory:id,name')
			->withCount('productReviews')
			->withAvg('productReviews', 'rating')
			->paginate(9);

		$brands = Brand::all();

		return view('main.products', compact('products', 'categories', 'brands'));
	}
	public function detail(string $id)
	{
		$product = Product::with('vendor', 'productReviews')->where('id', $id)->first();

		$product->ratings = round($product->productReviews->avg('rating'), 1);
		$product->total_reviews = $product->productReviews->count();

		return view('main.product-details', compact('product'));
	}
}

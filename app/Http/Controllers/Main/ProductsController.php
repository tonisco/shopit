<?php

namespace App\Http\Controllers\Main;

use App\Enums\ProductApprovedEnum;
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
			->where('status', true)
			->where('approved', ProductApprovedEnum::Approved)
			->withCount('productReviews')
			->withAvg('productReviews', 'rating')
			->paginate(9);

		$brands = Brand::all();

		return view('main.products', compact('products', 'categories', 'brands'));
	}
	public function detail(string $id)
	{
		// TODO: find or fail
		$product = Product::with('vendor', 'productReviews')->where('id', $id)
			->where('status', true)
			->where('approved', 'approved')
			->withCount('productReviews')
			->withAvg('productReviews', 'rating')
			->first();

		return view('main.product-details', compact('product'));
	}
}

<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
	public function all()
	{
		$vendors = Vendor::paginate(6);

		return view('main.vendors', compact('vendors'));
	}

	public function products(string $id)
	{
		$vendor = Vendor::where('id', $id)->first();

		$products = Product::where('vendor_id', $id)
			->withAvg('productReviews', 'rating')
			->withCount('productReviews')
			->paginate(9);

		return view('main.vendors-store', compact('vendor', 'products'));
	}
}

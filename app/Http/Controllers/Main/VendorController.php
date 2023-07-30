<?php

namespace App\Http\Controllers\Main;

use App\Enums\ProductApprovedEnum;
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
		// TODO: find or fail
		$vendor = Vendor::where('id', $id)->first();

		$products = Product::where('vendor_id', $id)
			->where('status', true)
			->where('approved', ProductApprovedEnum::Approved)
			->withAvg('productReviews', 'rating')
			->withCount('productReviews')
			->paginate(9);

		return view('main.vendors-store', compact('vendor', 'products'));
	}
}

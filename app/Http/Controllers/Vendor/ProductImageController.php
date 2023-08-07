<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductImageController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index(Product $product)
	{
		if ($product->vendor_id != Auth::user()->vendor->id) {
			abort(404);
		}

		$images = ProductImage::where('product_id', $product->id);

		return view('vendor.Products.images.index', compact('product'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create(Product $product)
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request, Product $product)
	{
		//
	}

	/**
	 * Display the specified resource.
	 */
	public function show(Product $product, ProductImage $productImage)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(Product $product, ProductImage $productImage)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, Product $product, ProductImage $productImage)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Product $product, ProductImage $productImage)
	{
		//
	}
}

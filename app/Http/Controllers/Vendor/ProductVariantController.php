<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class ProductVariantController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index(Request $request, Product $product)
	{
		if ($product->vendor_id != Auth::user()->vendor->id) {
			abort(404);
		}

		if ($request->ajax()) {
			return DataTables::of($product->productVariants)
				->addIndexColumn()
				->addColumn('action', function ($query) {
					return [
						'edit' => route('vendor.products.variants.edit', ['product' => $query->product_id, 'variant' => $query->id,]),
						'delete' => route('vendor.products.variants.destroy', ['product' => $query->product_id, 'variant' => $query->id,]),
						'variant' => route('vendor.products.variants.index', $query->id)
					];
				})->make(true);
		}

		return view('vendor.Products.variants.index', compact('product'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create(Product $product)
	{
		if ($product->vendor_id != Auth::user()->vendor->id) {
			abort(404);
		}

		return view('vendor.Products.variants.create', compact('product'));
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request, Product $product)
	{
		if ($product->vendor_id != Auth::user()->vendor->id) {
			abort(404);
		}

		$request->validate([
			'name' => ['required', 'max:200'],
			'status' => ['required'],
		]);

		$product->productVariants()->create([
			'name' => $request->name,
			'status' => $request->status === 'active'
		]);

		Session::flash('success', ['title' => 'Product Variant Created', 'message' => 'Product Variant has been created']);

		return redirect()->route('vendor.products.variants.index', $product);
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $productId, string $productVariantId)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(string $productId, string $productVariantId)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $productId, string $productVariantId)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $productId, string $productVariantId)
	{
		//
	}
}

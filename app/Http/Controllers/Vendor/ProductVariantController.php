<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ProductVariantController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index(Request $request, string $productId)
	{
		$product = Product::where('id', $productId)
			->where('vendor_id', Auth::user()->vendor->id)
			->with('ProductVariants')
			->firstOrFail();

		if ($request->ajax()) {
			return DataTables::of([])
				->addIndexColumn()
				->addColumn('action', function ($query) {
					return [
						'edit' => route('vendor.products.variants.edit', ['productId' => $query->product_id, 'productVariantId' => $query->id,]),
						'delete' => route('vendor.products.variants.destroy', ['productId' => $query->product_id, 'productVariantId' => $query->id,]),
						'variant' => route('vendor.products.variants.index', $query->id)
					];
				})->make(true);
		}

		return view('vendor.Products.variants.index', compact('product'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create(string $productId)
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request, string $productId)
	{
		//
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

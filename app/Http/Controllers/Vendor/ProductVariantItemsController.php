<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ProductVariantItemsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index(Request $request, string $productId, string $productVariantId)
	{
		$productVariant = ProductVariant::with(['product' => function (BelongsTo $query) use ($productId) {
			$query->where('vendor_id', Auth::user()->vendor->id)
				->where('id', $productId)
				->firstOrFail();
		}])
			->where('id', $productVariantId)
			->firstOrFail();

		if ($request->ajax()) {
			return DataTables::of($productVariant->productVariantItems)
				->addIndexColumn()
				->addColumn('action', function ($query) use ($productVariant) {
					return [
						'edit' => route('vendor.products.variants.items.edit', ['product' => $productVariant->product_id, 'variant' => $productVariant->id, 'item' => $query->id,]),
						'delete' => route('vendor.products.variants.items.destroy', ['product' => $productVariant->product_id, 'variant' => $productVariant->id, 'item' => $query->id,]),
					];
				})
				->make(true);
		}

		return view('vendor.Products.variants.item.index', compact('productVariant'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create(string $productId, string $productVariantId)
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request, string $productId, string $productVariantId)
	{
		//
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $productId, string $productVariantId, string $productVariantItemId)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(string $productId, string $productVariantId, string $productVariantItemId)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $productId, string $productVariantId, string $productVariantItemId)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $productId, string $productVariantId, string $productVariantItemId)
	{
		//
	}
}

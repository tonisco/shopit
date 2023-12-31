<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantItem;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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
			->with('productVariant')
			->firstOrFail();

		if ($request->ajax()) {
			return DataTables::of($product->productVariant)
				->addIndexColumn()
				->addColumn('action', function ($query) {
					return [
						'edit' => route('vendor.products.variants.edit', ['product' => $query->product_id, 'variant' => $query->id,]),
						'delete' => route('vendor.products.variants.destroy', ['product' => $query->product_id, 'variant' => $query->id,]),
						'variant_items' => route('vendor.products.variants.items.edit', ['product' => $query->product_id, 'variant' => $query->id])
					];
				})
				->make(true);
		}

		return view('vendor.Products.variants.index', compact('product'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create(string $productId)
	{
		$product = Product::where('id', $productId)
			->where('vendor_id', Auth::user()->vendor->id)
			->firstOrFail();

		return view('vendor.Products.variants.create', compact('product'));
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request, string $productId)
	{
		$product = Product::where('id', $productId)
			->where('vendor_id', Auth::user()->vendor->id)
			->firstOrFail();

		$request->validate([
			'name' => ['required', 'max:200', 'unique:product_variants'],
			'status' => ['required'],
			'option-name-1'  => ['required', 'string'],
			'option-price-1' => ['required', 'string']
		]);

		$productVariant = ProductVariant::create([
			'name' => $request->name,
			'status' => $request->status === 'active',
			'product_id' => $product->id,
		]);

		$variantItems = [];
		$index = 1;
		$hasMore = true;

		while ($hasMore) {
			if (isset($request['option-name-' . $index]) && isset($request['option-price-' . $index])) {
				array_push($variantItems, [
					'name' => $request['option-name-' . $index],
					'price' => $request['option-price-' . $index],
					'default' => false,
					'product_variant_id' => $productVariant->id,
				]);

				$index++;
			} else {
				$hasMore = false;
			}
		}

		ProductVariantItem::insert($variantItems);

		$message = ['title' => 'Product Variant Created', 'message' => 'Product Variant has been created'];

		return redirect()->route('vendor.products.variants.index', $product)->with('success', $message);
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
		$productVariant = ProductVariant::where('id', $productVariantId)
			->whereHas('product', function (Builder $query) use ($productId) {
				$query->where('vendor_id', Auth::user()->vendor->id)->where('id', $productId);
			})
			->with('productVariantItems')
			->firstOrFail();

		return view('vendor.Products.variants.edit', compact('productVariant', 'productId'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $productId, string $productVariantId)
	{
		$productVariant = ProductVariant::where('id', $productVariantId)
			->whereHas('product', function (Builder $query) use ($productId) {
				$query->where('vendor_id', Auth::user()->vendor->id)->where('id', $productId);
			})->firstOrFail();

		$request->validate([
			'name' => ['required', 'max:200'],
			'status' => ['required'],
		]);

		$productVariant->name = $request->name;
		$productVariant->status = $request->status === 'active';
		$productVariant->save();

		$message = ['title' => 'Product Variant Updated', 'message' => 'Product Variant has been updated successfully'];

		return  redirect()->route('vendor.products.variants.index', ['product' => $productId])->with('success', $message);
	}

	public function variantStatus(Request $request, string $productId, string $productVariantId)
	{
		$productVariant = ProductVariant::where('id', $productVariantId)
			->whereHas('product', function (Builder $query) use ($productId) {
				$query->where('vendor_id', Auth::user()->vendor->id)->where('id', $productId);
			})->firstOrFail();

		$productVariant->status = !$productVariant->status;
		$productVariant->save();
		$message = ['title' => 'Variant Status', 'message' => 'Variant status has successfully been updated'];

		return redirect()->back()->with('success', $message);
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $productId, string $productVariantId)
	{
		$productVariant = ProductVariant::where('id', $productVariantId)
			->whereHas('product', function (Builder $query) use ($productId) {
				$query->where('vendor_id', Auth::user()->vendor->id)->where('id', $productId);
			})->firstOrFail();

		$productVariant->delete();
		$message = ['title' => 'Variant Deleted', 'message' => 'Product Variant has been deleted'];

		return redirect()->back()->with('success', $message);
	}

	/**
	 * Store a newly created variant Item in storage.
	 */
	public function storeVariantItem(Request $request, string $productId, string $productVariantId)
	{
		// vendor check
		$productVariant = ProductVariant::where('id', $productVariantId)
			->whereHas('product', function (Builder $query) use ($productId) {
				$query->where('vendor_id', Auth::user()->vendor->id)->where('id', $productId);
			})->firstOrFail();

		$request->validate([
			'name' => ['required', 'string'],
			'price' => ['required', 'numeric'],
			'qty' => ['required', 'numeric']
		]);

		$variant = $productVariant->productVariantItems()->create([
			'name' => $request->name,
			'price' => $request->price,
			'qty' => $request->qty,
			// 'default' => false,
		]);

		return response([
			'item' => $variant,
			'link' => route('vendor.products.variants.items.update', ['product' => $productId, 'variant' => $variant, 'item' => 1]),
			'deletelink' => route('vendor.products.variants.items.destroy', ['product' => $productId, 'variant' => $variant, 'item' => 1]),
		]);
	}

	/**
	 * update specified variant Item in storage.
	 */
	public function updateVariantItem(Request $request, string $productId, string $productVariantId, string $productVariantItemId)
	{
		$variantItem = ProductVariantItem::where('id', $productVariantItemId)
			->whereHas('productVariant', function (Builder $query) use ($productVariantId, $productId) {
				$query->where('id', $productVariantId)
					->whereHas('product', function (Builder $query) use ($productId) {
						$query->where('vendor_id', Auth::user()->vendor->id)->where('id', $productId);
					});
			})
			->firstOrFail();

		$request->validate([
			'name' => ['required', 'string'],
			'price' => ['required', 'string'],
			'qty' => ['required', 'numeric']
		]);

		$variantItem->name = $request->name;
		$variantItem->price = $request->price;
		$variantItem->qty = $request->qty;

		$variantItem->save();

		return response(['message' => 'Variant Item has been updated!']);
	}

	/**
	 * destroy specified variant Item in storage.
	 */
	public function destroyVariantItem(string $productId, string $productVariantId, string $productVariantItemId)
	{
		$variantItem = ProductVariantItem::where('id', $productVariantItemId)
			->whereHas('productVariant', function (Builder $query) use ($productVariantId, $productId) {
				$query->where('id', $productVariantId)
					->whereHas('product', function (Builder $query) use ($productId) {
						$query->where('vendor_id', Auth::user()->vendor->id)->where('id', $productId);
					});
			})
			->firstOrFail();

		$variantItem->delete();

		return response(['message' => 'Variant item has been deleted!']);
	}
}

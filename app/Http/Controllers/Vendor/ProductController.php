<?php

namespace App\Http\Controllers\Vendor;

use App\Enums\ProductApprovedEnum;
use App\Http\Controllers\Controller;
use App\Http\Traits\ImageUploadTrait;
use App\Http\Traits\UtilsTrait;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use DateTime;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
	use ImageUploadTrait, UtilsTrait;

	/**
	 * Display a listing of the resource.
	 */
	public function index(Request $request)
	{
		if ($request->ajax()) {
			$data = Product::where('vendor_id', Auth::user()->vendor->id)
				->withAvg('productReviews', 'rating')
				->get();
			return DataTables::of($data)
				->addIndexColumn()
				->addColumn('discount', function ($query) {
					if ($query->discount) {
						$now = new DateTime('now');
						if ($query->discount_start_date < $now && $query->discount_end_date > $now) {
							return  $query->discount . '%';
						}
					}
				})
				->addColumn('action', function ($query) {
					return [
						'edit' => route('vendor.products.edit', $query->id),
						'delete' => route('vendor.products.destroy', $query->id),
						'variant' => route('vendor.products.variants.index', $query->id)
					];
				})
				->addColumn('image', function ($query) {
					return asset($query->image);
				})
				->addColumn('approved', function ($query) {
					if ($query->approved == ProductApprovedEnum::Approved->value) {
						return '<div class="flex">
									<i class="approve-icon bi bi-check-circle-fill"></i>
								</div>';
					} else if ($query->approved == ProductApprovedEnum::Pending->value)
						return '<div class="flex">
								<i class="pending-icon bi bi-clock-history"></i>
							</div>';
					else
						return '<div class="flex">
								<i class="cancel-icon bi bi-x-circle-fill"></i>
							</div>';
				})
				->rawColumns(['image', 'action', 'approved'])
				->make(true);
		}
		return view('vendor.Products.index');
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		$categories = Category::with('subCategories:id,name,category_id')
			->select('id', 'name',)->get();

		$brands = Brand::select('id', 'name')->get();

		return view('vendor.Products.create', compact('categories', 'brands'));
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		// TODO: check discount date validation
		$request->validate([
			'name' => ['required', 'max:200'],
			'image' => ['required', 'image', 'max:3000'],
			'category' => ['required'],
			'brand' => ['required'],
			'price' => ['required', 'numeric'],
			'qty' => ['required_without:use_variant', 'nullable', 'numeric'],
			'short_description' => ['required'],
			'long_description' => ['required'],
			'status' => ['required'],
			'discount' => ['numeric', 'nullable'],
			'discount_date' => ['required_with:discount'],
			'product_image1' => ['nullable', 'image', 'max:3000'],
			'product_image2' => ['nullable', 'image', 'max:3000'],
			'product_image3' => ['nullable', 'image', 'max:3000'],
			'product_image4' => ['nullable', 'image', 'max:3000'],
			'product_image5' => ['nullable', 'image', 'max:3000'],
			'product_image6' => ['nullable', 'image', 'max:3000'],
			'use_variant' => ['nullable', 'string'],
			'variant_name' => ['required_with:use_variant', 'nullable', 'string'],
			'option_name_1' => ['required_with:use_variant', 'nullable', 'string'],
			'option_price_1' => ['required_with:use_variant', 'nullable', 'numeric'],
			'option_qty_1' => ['required_with:use_variant', 'nullable', 'numeric'],
		]);

		$image = $this->uploadImage($request, 'image', 'product', Str::slug($request->name));

		$discount_start_date = null;
		$discount_end_date = null;

		if ($request->discount_date) {
			$dates = explode(' to ', $request->discount_date);
			$discount_start_date = $dates[0];
			$discount_end_date = $dates[1];
		}

		$product = Product::create([
			'name' => $request->name,
			'slug' => Str::slug($request->name),
			'image' => $image,
			'qty' => $request->qty ?? 0,
			'price' => $request->price,
			'short_description' => $request->short_description,
			'long_description' => $request->long_description,
			'vendor_id' => Auth::user()->vendor->id,
			'discount' => $request->discount,
			'discount_start_date' => $discount_start_date,
			'discount_end_date' => $discount_end_date,
			'category_id' => $request->category,
			'sub_category_id' => $request->sub_category,
			'brand_id' => $request->brand,
			'approved' => ProductApprovedEnum::Pending->value,
			'status' => $request->status === 'active',
			'seo_title' => $request->seo_title,
			'seo_description' => $request->seo_description,
		]);

		$this->handleProductImages($request, $product);
		if (isset($request->use_variant) && $request->use_variant === "on") {
			$this->handleProductVariant($request, $product);
		}

		Session::flash('success', ['title' => 'Product Created', 'message' => 'Product has been created and is awaiting approval']);


		return redirect()->route('vendor.products.index');
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(string $id)
	{
		$product = Product::where('id', $id)
			->where('vendor_id', Auth::user()->vendor->id)
			->with(['productImages', 'ProductVariant' => function (HasOne $query) {
				$query->with('ProductVariantItems')->get();
			}])
			->firstOrFail();

		$categories = Category::with('subCategories:id,name,category_id')
			->select('id', 'name',)->get();

		$brands = Brand::select('id', 'name')->get();

		return view('vendor.Products.edit', compact('product', 'categories', 'brands'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $id)
	{
		$product = Product::where('id', $id)
			->where('vendor_id', Auth::user()->vendor->id)
			->firstOrFail();

		$request->validate([
			'name' => ['required', 'max:200'],
			'image' => ['image', 'max:3000'],
			'category' => ['required'],
			'brand' => ['required'],
			'price' => ['required', 'numeric'],
			'qty' => ['required_without:use_variant', 'nullable', 'numeric'],
			'short_description' => ['required'],
			'long_description' => ['required'],
			'status' => ['required'],
			'discount' => ['numeric', 'nullable'],
			'discount_date' => ['required_with:discount'],
			'product_image1' => ['nullable', 'image', 'max:3000'],
			'product_image2' => ['nullable', 'image', 'max:3000'],
			'product_image3' => ['nullable', 'image', 'max:3000'],
			'product_image4' => ['nullable', 'image', 'max:3000'],
			'product_image5' => ['nullable', 'image', 'max:3000'],
			'product_image6' => ['nullable', 'image', 'max:3000'],
			'use_variant' => ['nullable', 'string'],
			'variant_name' => ['required_with:use_variant', 'nullable', 'string'],
			'option_name_1' => ['required_with:use_variant', 'nullable', 'string'],
			'option_price_1' => ['required_with:use_variant', 'nullable', 'numeric'],
			'option_qty_1' => ['required_with:use_variant', 'nullable', 'numeric'],
		]);

		if ($request->hasFile('image')) {
			$image = $this->replaceImage($request, 'image', 'product', 'product', $product->image);

			$product->image = $image;
		}

		$discount_start_date = null;
		$discount_end_date = null;

		if ($request->discount_date) {
			$dates = explode(' to ', $request->discount_date);
			$discount_start_date = $dates[0];
			$discount_end_date = $dates[1];
		}

		$product->name = $request->name;
		$product->slug = Str::slug($request->name);
		$product->qty = $request->qty ?? 0;
		$product->price = $request->price;
		$product->short_description = $request->short_description;
		$product->long_description = $request->long_description;
		$product->discount = $request->discount;
		$product->discount_start_date = $discount_start_date;
		$product->discount_end_date = $discount_end_date;
		$product->category_id = $request->category;
		$product->sub_category_id = $request->sub_category_id;
		$product->brand_id = $request->brand;
		$product->status = $request->status === 'active';
		$product->seo_title = $request->seo_title;
		$product->seo_description = $request->seo_description;

		if ($product->approved == ProductApprovedEnum::Rejected->value) {
			$product->approved = ProductApprovedEnum::Pending->value;
		}

		$product->save();

		$this->handleProductImages($request, $product);

		if (isset($request->use_variant) && $request->use_variant === "on") {
			$this->handleProductVariant($request, $product);
		}

		Session::flash('success', ['title' => 'Product Updated', 'message' => 'Product details has been updated']);

		return redirect()->route('vendor.products.index');
	}

	public function productStatus(Request $request, string $id)
	{
		$product = Product::where('id', $id)->where('vendor_id', Auth::user()->vendor->id)->firstOrFail();
		if ($product->vendor_id !== Auth::user()->vendor->id) {
			$error_message = ['title' => 'Unauthorized Operation', 'message' => 'You are not authorized to updated this product'];
			Session::flash('error', $error_message);
			return redirect()->back();
		}

		$product->status = !$product->status;
		$product->save();
		$message = ['title' => 'Product Updated', 'message' => 'Product status has successfully been updated'];
		Session::flash('success', $message);

		return redirect()->back();
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		$product = Product::with('productImages')
			->where('id', $id)
			->where('vendor_id', Auth::user()->vendor->id)
			->firstOrFail();

		$this->deleteImage($product->image);

		foreach ($product->productImages as $productImage) {
			$this->deleteImage($productImage->image);
		}

		$product->delete();

		$message = ['title' => 'Product Delete', 'message' => 'Product has been deleted'];
		Session::flash('success', $message);

		return redirect()->route('vendor.products.index');
	}

	public function handleProductImages(Request $request, Product $product)
	{
		$productImages = $product->productImages;

		$productImageDelete = [];

		for ($i = 1; $i <= 6; $i++) {
			if ($request['delete_product_image' . $i]) {
				$id = $request['delete_product_image' . $i];
				array_push($productImageDelete, $id);
				$item = $this->searchForId($id, $productImages);

				if ($item) {
					$this->deleteImage($productImages[$item]->image);
				}
			}
		}

		$product->productImages()->whereIn('id', $productImageDelete)->delete();


		$productImgs = [];

		for ($i = 1; $i <= 6; $i++) {
			if ($request['product_image' . $i]) {
				$productImage = $this->uploadImage($request, 'product_image' . $i, 'product_image', $product->slug);
				array_push($productImgs, ['image' => $productImage, 'product_id' => $product->id]);
			}
		}

		$product->productImages()->createMany($productImgs);
	}

	public function handleProductVariant(Request $request, Product $product)
	{
		$productVariantItems = [];

		$productVariant = $product->productVariant();

		$index = 1;

		while (isset($request['option_name_' . $index]) && isset($request['option_price_' . $index]) && isset($request['option_qty_' . $index])) {
			array_push($productVariantItems, [
				'name' => $request['option_name_' . $index],
				'price' => $request['option_price_' . $index],
				'qty' => $request['option_qty_' . $index]
			]);
			$index++;
		}

		if ($productVariant && isset($request['delete_variant_items'])) {
			$variantItems = explode('_', $request['delete_variant_items']);
			$items = $productVariant->productVariantItems();

			$items->whereIn('id', $variantItems)->delete();

			$items->createMany($productVariantItems);
		} else {
			$newProductVariant = ProductVariant::create([
				'name' => $request['variant_name'],
				'product_id' => $product->id,
			]);

			$newProductVariant->productVariantItems()->createMany($productVariantItems);
		}
	}
}

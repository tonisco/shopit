<?php

namespace App\Http\Controllers\Vendor;

use App\Enums\ProductApprovedEnum;
use App\Http\Controllers\Controller;
use App\Http\Traits\ImageUploadTrait;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
	use ImageUploadTrait;

	/**
	 * Display a listing of the resource.
	 */
	public function index(Request $request)
	{
		if ($request->ajax()) {
			$data = Product::where('vendor_id', Auth::user()->vendor->id)->get();
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
				->addColumn('price', function ($query) {
					return '$' . number_format($query->price);
				})
				->addColumn('action', function ($query) {
					$edit_button = "<a href='" . route('vendor.products.edit', $query->id) . "' class='bg-blue-500 action-button dark:bg-blue-700'><i class='action-button-icon bi bi-pencil-square'></i></a>";

					$delete_button = '<div>
										<a class="bg-red-500 action-button dark:bg-red-700 deleteButton"
										data-id="' . $query->id . '" data-name="' . $query->name . '" data-route="' . route('vendor.products.destroy', $query->id) . '">
											<i class="action-button-icon bi bi-trash"></i>
										</a>
									</div>';

					$options_button = '<div x-data="toggler" class="relative">
										<a @click="toggle" class="action-button bg-zinc-700">
											<i class="action-button-icon bi bi-three-dots-vertical"></i>
										</a>
										<div @click.outside="toggle" x-show="open" class="product-options">
											<a class="product-options-item">Image Gallery</a>
											<a class="product-options-item">Variants</a>
										</div>
									</div>';
					return '<div class="flex items-center gap-2">
					' . $edit_button . ' ' . $delete_button . ' ' . $options_button . '</div';
				})
				->addColumn('image', function ($query) {
					return "<img src='" . asset($query->image) . "' alt='" . $query->name . "' class='table-image'>";
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
		$request->validate([
			'name' => ['required', 'max:200'],
			'image' => ['required', 'image', 'max:3000'],
			'category' => ['required'],
			'brand' => ['required'],
			'price' => ['required', 'numeric'],
			'discount' => ['numeric', 'nullable'],
			'discount_date' => ['required_with:discount', 'regex:/to/i' => 'End Date is required'],
			'qty' => ['required', 'numeric'],
			'short_description' => ['required'],
			'long_description' => ['required'],
			'status' => ['required'],
		]);

		$image = $this->uploadImage($request, 'image', 'product', 'product');

		$discount_start_date = null;
		$discount_end_date = null;

		if ($request->discount_date) {
			$dates = explode(' to ', $request->discount_date);
			$discount_start_date = $dates[0];
			$discount_end_date = $dates[1];
		}

		Product::create([
			'name' => $request->name,
			'slug' => Str::slug($request->name),
			'image' => $image,
			'qty' => $request->qty,
			'price' => $request->price,
			'short_description' => $request->short_description,
			'long_description' => $request->long_description,
			'vendor_id' => Auth::user()->vendor->id,
			'discount' => $request->discount,
			'discount_start_date' => $discount_start_date,
			'discount_end_date' => $discount_end_date,
			'category_id' => $request->category,
			'sub_category_id' => $request->sub_category_id,
			'brand_id' => $request->brand,
			'approved' => 0,
			'status' => $request->status,
		]);

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
		$product = Product::where('id', $id)->where('vendor_id', Auth::user()->vendor->id)->firstOrFail();

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
		//
	}

	public function productStatus(Request $request, string $id)
	{
		error_log(Auth::user()->vendor->id);
		$product = Product::findOrFail($id);
		if ($product->vendor_id !== Auth::user()->vendor->id) {
			$error_message = ['title' => 'Unauthorized Operation', 'message' => 'You are not authorized to updated this product'];
			Session::flash('error', $error_message);
			return back();
		}

		$product->status = !$product->status;
		$product->save();
		$error_message = ['title' => 'Product Updated', 'message' => 'Product status has successfully been updated'];
		Session::flash('success', $error_message);

		return back();
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		//
	}
}

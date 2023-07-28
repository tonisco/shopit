<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index(Request $request)
	{
		if ($request->ajax()) {
			$data = Product::where('vendor_id', Auth::user()->vendor->id)->get();
			return DataTables::of($data)
				->addIndexColumn()
				->addColumn('action', function ($query) {
					$edit_button = "<a href='" . route('vendor.product.edit', $query->id) . "' class='p-2 bg-blue-500 rounded cursor-pointer dark:bg-blue-700'><i class='w-4 h-4 text-white bi bi-pencil-square'></i></a>";

					$delete_button = '<div>
										<a class="p-2 bg-red-500 rounded cursor-pointer dark:bg-red-700 deleteButton"
										data-id="' . $query->id . '" data-name="' . $query->name . '" data-route="' . route('vendor.product.destroy', $query->id) . '">
											<i class="w-4 h-4 text-white bi bi-trash"></i>
										</a>
									</div>';

					$options_button = '<div x-data="toggler" class="relative cursor-pointer">
										<a @click="toggle" class="p-2 rounded bg-zinc-700">
											<i class="w-4 h-4 text-white bi bi-three-dots-vertical"></i>
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
					return "<img src='" . asset($query->image) . "' alt='" . $query->name . "' class='object-cover w-16'>";
				})
				->rawColumns(['image', 'action'])
				->make(true);
		}
		return view('vendor.products');
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		//
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
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		//
	}
}

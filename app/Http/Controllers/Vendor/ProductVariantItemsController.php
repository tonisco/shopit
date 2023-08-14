<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductVariantItemsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index(Request $request, string $productId, string $productVariantId)
	{
		return view('vendor.Products.variants.item.index');
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

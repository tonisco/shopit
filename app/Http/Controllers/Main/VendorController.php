<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
	public function all()
	{
		$vendors = Vendor::paginate(6);

		return view('main.vendors', compact('vendors'));
	}
}

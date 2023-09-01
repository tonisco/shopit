<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
	public function index()
	{
		$vendor = Auth::user()->vendor;

		return view('vendor.Profile.index', ['vendor' => $vendor]);
	}
}

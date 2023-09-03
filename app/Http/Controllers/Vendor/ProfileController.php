<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Http\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
	use ImageUploadTrait;

	public function index()
	{
		$vendor = Auth::user()->vendor;

		return view('vendor.Profile.index', ['vendor' => $vendor]);
	}

	public function updateProfile(Request $request)
	{
		$request->validate([
			'name' => ['required', 'string'],
			'image' => ['nullable', 'image', 'max:3000'],
			'email' => ['required', 'email'],
			'phone' => ['required', 'integer'],
			'address' => ['required', 'string'],
			'description' => ['required', 'string'],
			'fb_link' => ['nullable', 'string'],
			'tw_link' => ['nullable', 'string'],
			'insta_link' => ['nullable', 'string'],
		]);

		$vendor = Auth::user()->vendor;

		$vendor->name = $request['name'];
		$vendor->email = $request['email'];
		$vendor->phone = $request['phone'];
		$vendor->address = $request['address'];
		$vendor->description = $request['description'];
		$vendor->fb_link = $request['fb_link'];
		$vendor->tw_link = $request['tw_link'];
		$vendor->insta_link = $request['insta_link'];

		if (($request->hasFile('image'))) {
			$image = $this->replaceImage($request, 'image', 'vendor', $vendor->name, $vendor->image);
			if ($image) $vendor->image = $image;
		}

		$vendor->save();

		Session::flash('success', ['title' => 'Profile Updated', 'message' => 'Profile has successfully been updated']);

		return redirect()->back();
	}
}

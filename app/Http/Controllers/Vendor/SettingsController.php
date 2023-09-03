<?php

namespace App\Http\Controllers\Vendor;

use App\Enums\UserRoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Traits\ImageUploadTrait;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
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

	public function deleteAccount()
	{
		$user = User::findOrFail(Auth::user()->id);
		$vendor = Vendor::where('user_id', $user->id)
			->with(['products' => function (HasMany $query) {
				return $query->with('productImages');
			}])
			->firstOrFail();

		// delete vendor image
		$this->deleteImage($vendor->image);

		// delete vendor product image and product gallery images
		foreach ($vendor->products as $product) {
			$this->deleteImage($product->image);

			foreach ($product->productImages as $productImage) {
				$this->deleteImage($productImage->image);
			}
		}

		$vendor->delete();

		$user->role = UserRoleEnum::User;

		$user->save();

		Session::flash('success', ['title' => 'Vendor Account', 'message' => 'Your vendor account has successfully been deleted']);

		return redirect()->route('home');
	}
}

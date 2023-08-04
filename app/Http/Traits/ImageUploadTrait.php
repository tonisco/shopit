<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

trait ImageUploadTrait
{
	public function uploadImage(Request $request, string $imageName, string $path, string $type)
	{
		if ($request->hasFile($imageName)) {
			$image = $request[$imageName];
			$ext = $image->getClientOriginalExtension();
			$name = $type . '-' . uniqid() . '.' . $ext;
			$image->move(public_path($path), $name);

			return $path . '/' . $name;
		}
	}

	public function replaceImage(Request $request, string $imageName, string $path, string $type, string $oldImage = null)
	{
		if ($request->hasFile($imageName)) {
			if (File::exists(public_path($oldImage))) {
				File::delete(public_path($oldImage));
			}

			return $this->uploadImage($request, $imageName, $path, $type);
		}
	}

	public function deleteImage(string $imageName)
	{
		if (File::exists(public_path($imageName))) {
			File::delete(public_path($imageName));
		}
	}
}

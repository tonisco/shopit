<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;

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
}

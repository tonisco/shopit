<?php

namespace App\Models;

use App\Enums\VendorRequestStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
	use HasFactory;

	protected $fillable = [
		'name',
		'image',
		'email',
		'phone',
		'address',
		'description',
		'status',
		'fb_link',
		'tw_link',
		'insta_link',
		'user_id',
	];

	protected $cast = [
		'status' => VendorRequestStatusEnum::class
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function products()
	{
		return $this->hasMany(Product::class);
	}
}

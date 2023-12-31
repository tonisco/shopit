<?php

namespace App\Models;

use App\Enums\ProductApprovedEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	use HasFactory;

	protected $cast = [
		'approved' => ProductApprovedEnum::class
	];

	protected $fillable = [
		'name',
		'slug',
		'image',
		'qty',
		'price',
		'short_description',
		'long_description',
		'vendor_id',
		'discount',
		'discount_start_date',
		'discount_end_date',
		'category_id',
		'sub_category_id',
		'brand_id',
		'approved',
		'status',
	];

	public function vendor()
	{
		return $this->belongsTo(Vendor::class);
	}

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function subCategory()
	{
		return $this->belongsTo(SubCategory::class);
	}

	public function brand()
	{
		return $this->belongsTo(Brand::class);
	}

	public function productImages()
	{
		return $this->hasMany(ProductImage::class);
	}

	public function productVariant()
	{
		return $this->hasOne(ProductVariant::class);
	}

	public function productReviews()
	{
		return $this->hasMany(ProductReview::class);
	}

	public function orderProducts()
	{
		return $this->hasMany(OrderProduct::class);
	}

	public function wishlist()
	{
		return $this->hasMany(Wishlist::class);
	}
}

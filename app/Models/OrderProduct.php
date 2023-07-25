<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
	use HasFactory;

	protected $fillable = [
		'product_name',
		'variants',
		'price',
		'qty',
		'total',
		'order_id',
		'product_id',
		'vendor_id'
	];

	public function order()
	{
		return $this->belongsTo(Order::class);
	}

	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	public function vendor()
	{
		return $this->belongsTo(Vendor::class);
	}
}

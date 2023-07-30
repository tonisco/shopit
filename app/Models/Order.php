<?php

namespace App\Models;

use App\Enums\OrderStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	use HasFactory;

	protected $fillable = [
		'status',
		'address',
		'sub_total',
		'total',
		'payment_method',
		'payment_status',
		'product_qty',
		'user_id',
		'shipping_method_id',
		'coupon_id',
	];

	protected $cast = [
		'status' => OrderStatusEnum::class
	];

	public function orderProducts()
	{
		return $this->hasMany(OrderProduct::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function coupon()
	{
		return $this->belongsTo(Coupon::class);
	}

	public function shippingMethod()
	{
		return $this->belongsTo(ShippingMethod::class);
	}

	public function transaction()
	{
		return $this->hasOne(Transaction::class);
	}
}

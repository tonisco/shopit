<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\UserRoleEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
	use HasApiTokens, HasFactory, Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'email',
		'password',
		'first_name',
		'last_name',
		'role',
		'image',
		'phone',
		'status',
	];

	protected $cast = [
		'role' => UserRoleEnum::class
	];

	/**
	 * The attributes that should be hidden for serialization.
	 *
	 * @var array<int, string>
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	/**
	 * The attributes that should be cast.
	 *
	 * @var array<string, string>
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
		'password' => 'hashed',
	];


	public function vendor()
	{
		return $this->hasOne(Vendor::class);
	}

	public function addresses()
	{
		return $this->hasMany(UserAddress::class);
	}

	public function productReviews()
	{
		return $this->hasMany(ProductReview::class);
	}

	public function coupons()
	{
		return $this->hasMany(Coupon::class);
	}

	public function orders()
	{
		return $this->hasMany(Order::class);
	}

	public function wishlist()
	{
		return $this->hasMany(Wishlist::class);
	}
}

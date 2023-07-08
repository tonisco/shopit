<?php

namespace App\Models;

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
        'fb_link',
        'tw_link',
        'insta_link',
        'user_id',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

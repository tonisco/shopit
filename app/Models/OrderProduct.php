<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    // $table->foreign('order_id')->references('id')->on('orders');
    //         $table->foreign('product_id')->references('id')->on('products');
    //         $table->foreign('vendor_id')->references('id')->on('vendors');

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Order::class);
    }
}

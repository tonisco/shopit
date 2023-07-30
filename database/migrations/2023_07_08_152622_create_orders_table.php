<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('orders', function (Blueprint $table) {
			$table->id();
			$table->string('status');
			$table->text('address');
			$table->double('sub_total');
			$table->double('total');
			$table->string('payment_method');
			$table->string('payment_status');
			$table->string('product_qty');
			$table->unsignedBigInteger('user_id');
			$table->unsignedBigInteger('shipping_method_id');
			$table->unsignedBigInteger('coupon_id')->nullable();

			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('coupon_id')->references('id')->on('coupons');
			$table->foreign('shipping_method_id')->references('id')->on('shipping_methods');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('orders');
	}
};

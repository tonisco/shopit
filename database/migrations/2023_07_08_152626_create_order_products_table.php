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
		Schema::create('order_products', function (Blueprint $table) {
			$table->id();
			$table->string('product_name');
			$table->text('variants')->nullable();
			$table->double('price');
			$table->text('product_image');
			$table->double('total');
			$table->integer('qty');
			$table->unsignedBigInteger('order_id');
			$table->unsignedBigInteger('product_id');
			$table->unsignedBigInteger('vendor_id');

			$table->foreign('order_id')->references('id')->on('orders')->cascadeOnDelete();
			$table->foreign('product_id')->references('id')->on('products');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('order_products');
	}
};

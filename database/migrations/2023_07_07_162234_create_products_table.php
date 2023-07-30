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
		Schema::create('products', function (Blueprint $table) {
			$table->id();
			$table->string('name', 2000);
			$table->string('slug', 2000);
			$table->text('image');
			$table->integer('qty');
			$table->double('price');
			$table->text('short_description');
			$table->text('long_description');
			$table->unsignedBigInteger('vendor_id');
			$table->double('discount')->nullable();
			$table->date('discount_start_date')->nullable();
			$table->date('discount_end_date')->nullable();
			$table->unsignedBigInteger('category_id');
			$table->unsignedBigInteger('sub_category_id')->nullable();
			$table->unsignedBigInteger('brand_id');
			$table->enum('approved', ['approved', 'pending', 'rejected']);
			$table->boolean('status');

			$table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
			$table->foreign('category_id')->references('id')->on('categories');
			$table->foreign('sub_category_id')->references('id')->on('sub_categories');
			$table->foreign('brand_id')->references('id')->on('brands');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('products');
	}
};

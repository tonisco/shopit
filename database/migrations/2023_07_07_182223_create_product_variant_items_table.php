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
		Schema::create('product_variant_items', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->double('price');
			$table->boolean('default');
			$table->integer('qty');
			$table->unsignedBigInteger('product_variant_id');

			$table->foreign('product_variant_id')->references('id')->on('product_variants')->cascadeOnDelete();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('product_variant_items');
	}
};

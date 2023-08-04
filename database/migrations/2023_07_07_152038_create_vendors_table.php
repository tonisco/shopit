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
		Schema::create('vendors', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->text('image')->nullable();
			$table->string('email')->unique();
			$table->string('phone');
			$table->text('address');
			$table->text('description');
			$table->text('fb_link')->nullable();
			$table->text('tw_link')->nullable();
			$table->text('insta_link')->nullable();
			$table->unsignedBigInteger('user_id')->unique();

			$table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('vendors');
	}
};

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
        Schema::create('hero_sliders', function (Blueprint $table) {
            $table->id();
            $table->text('image');
            $table->integer('position');
            $table->string('title');
            $table->string('top_text')->nullable();
            $table->string('bottom_text')->nullable();
            $table->boolean('status')->nullable();
            $table->string('btn_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_sliders');
    }
};

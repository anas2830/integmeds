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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('button_color')->nullable();  // e.g. hex or tailwind class
            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();
            $table->string('slider_image'); // required image path
            $table->string('file_original_name')->nullable();
            $table->string('file_extension', 10)->nullable();
            $table->integer('file_size')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};

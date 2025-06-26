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
        // create about us page
        Schema::create('about_us_pages', function (Blueprint $table) {
            $table->id();
            $table->string('top_title')->nullable();
            $table->text('top_content')->nullable();
            $table->string('top_image')->nullable();
            $table->string('top_image_original_name')->nullable();
            $table->string('top_image_file_size')->nullable();
            $table->string('middle_first_image')->nullable();
            $table->string('middle_first_image_original_name')->nullable();
            $table->string('middle_first_image_file_size')->nullable();
            $table->string('middle_second_image')->nullable();
            $table->string('middle_second_image_original_name')->nullable();
            $table->string('middle_second_image_file_size')->nullable();
            $table->string('bottom_title')->nullable();
            $table->text('bottom_content')->nullable();
            $table->text('bottom_button_text')->nullable();
            $table->string('bottom_button_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

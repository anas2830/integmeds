<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('home_page_bodies', function (Blueprint $table) {
            $table->id();
            // Banner 1 Cover Image
            $table->string('banner_1_cover_image')->nullable();
            $table->string('banner_1_cover_original_name')->nullable();
            $table->string('banner_1_cover_extension', 10)->nullable();
            $table->integer('banner_1_cover_size')->nullable();

            $table->string('banner_1_featured_image')->nullable();
            $table->string('banner_1_featured_original_name')->nullable();
            $table->string('banner_1_featured_extension', 10)->nullable();
            $table->integer('banner_1_featured_size')->nullable();

            $table->string('banner_1_image')->nullable();
            $table->string('banner_1_image_original_name')->nullable();
            $table->string('banner_1_image_extension', 10)->nullable();
            $table->integer('banner_1_image_size')->nullable();

            $table->string('banner_1_title')->nullable();
            $table->text('banner_1_description')->nullable();
            $table->string('banner_1_btn_text')->nullable();
            $table->string('banner_1_btn_url')->nullable();

            $table->string('banner_2_image')->nullable();
            $table->string('banner_2_image_original_name')->nullable();
            $table->string('banner_2_image_extension', 10)->nullable();
            $table->integer('banner_2_image_size')->nullable();

            $table->string('banner_2_title')->nullable();
            $table->text('banner_2_description')->nullable();
            $table->string('banner_2_btn_text')->nullable();
            $table->string('banner_2_btn_url')->nullable();

            $table->timestamps();
        });

        // Insert default empty row
        DB::table('home_page_bodies')->insert([
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_page_bodies');
    }
};

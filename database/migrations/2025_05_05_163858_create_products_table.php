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
            $table->bigIncrements('id');
            $table->string('barcode')->nullable();
            $table->string('ups_code')->nullable();
            $table->string('product_name')->index();
            $table->string('slug')->unique();
            $table->string('sku')->unique();  // SKU (Stock Keeping Unit), should be unique
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->longText('research')->nullable();
            $table->decimal('purchase_price', 10, 2)->nullable();
            $table->decimal('regular_price', 10, 2)->nullable();
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->decimal('discount_price', 10, 2)->nullable();
            $table->decimal('discount_percentage', 10, 2)->nullable();
            $table->string('video_bn')->nullable(); // Bangla YouTube URL
            $table->string('video_en')->nullable(); // English YouTube URL
            $table->decimal('weight', 8, 2)->nullable();
            $table->enum('weight_unit', ['kg', 'g'])->nullable();
            $table->decimal('length', 8, 2)->nullable();
            $table->decimal('width', 8, 2)->nullable();
            $table->decimal('height', 8, 2)->nullable();
            $table->string('meta_title')->nullable(); // Meta title for SEO
            $table->string('meta_description')->nullable(); // Meta description for SEO
            $table->string('meta_keywords')->nullable(); // Meta keywords for SEO
            $table->unsignedInteger('quantity');
            $table->boolean('status')->default(1)->index();
            $table->softDeletes(); // Add soft deletes functionality
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

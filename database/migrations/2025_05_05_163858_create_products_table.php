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
            $table->string('product_name')->index();
            $table->string('sku')->unique();  // SKU (Stock Keeping Unit), should be unique
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->decimal('purchase_price', 10, 2)->nullable();
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->decimal('discount_price', 10, 2)->nullable();
            $table->decimal('discount_percentage', 10, 2)->nullable();
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

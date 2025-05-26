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
        Schema::create('cupons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->unique(); // Coupon code, e.g. SAVE10
            $table->enum('type', ['fixed', 'percent'])->default('fixed'); // Discount type
            $table->decimal('value', 10, 2); // Amount or percent value
            $table->decimal('min_purchase', 10, 2)->default(0); // Minimum purchase required
            $table->integer('usage_limit')->nullable(); // Total times coupon can be used
            $table->integer('used')->default(0); // How many times used
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->boolean('status')->default(true)->index();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cupons');
    }
};

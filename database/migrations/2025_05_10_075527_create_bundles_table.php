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
        Schema::create('bundles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique()->index();
            $table->text('description')->nullable();
            $table->boolean('status')->default(1)->index();
            $table->string('icon_path')->nullable();        // full path or relative storage path
            $table->string('file_original_name')->nullable();
            $table->string('file_extension', 10)->nullable();
            $table->integer('file_size')->nullable();       // in bytes
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bundles');
    }
};

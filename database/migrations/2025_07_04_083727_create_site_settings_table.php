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
        Schema::dropIfExists('site_settings');
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->nullable();
            $table->string('site_email')->nullable();
            $table->string('site_phone')->nullable();
            $table->string('site_description')->nullable();
            $table->string('copyright_text')->nullable();
            $table->string('logo')->nullable(); // store logo path/filename
            $table->string('favicon')->nullable(); // favicon path
            $table->string('address')->nullable();
            $table->string('currency')->nullable();
            $table->string('minimum_order')->nullable();
            $table->string('timezone')->nullable();
            $table->timestamps();
        });
        // Insert a single empty row on install
        DB::table('site_settings')->insert([
            [
                'site_name' => null,
                'site_email' => null,
                'site_phone' => null,
                'site_description' => null,
                'copyright_text' => null,
                'logo' => null,
                'favicon' => null,
                'address' => null,
                'currency' => null,
                'minimum_order' => null,
                'timezone' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};

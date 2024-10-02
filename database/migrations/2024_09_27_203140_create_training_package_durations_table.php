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
        Schema::create('training_package_durations', function (Blueprint $table) {
            $table->id();
            $table->string('duration');
            $table->decimal('price', 8);
            $table->decimal('discount_price', 8)->nullable(); // Discounted price
            $table->foreignId('package_id')->constrained('training_packages')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_package_durations');
    }
};
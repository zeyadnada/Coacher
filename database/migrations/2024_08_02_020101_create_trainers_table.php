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
        Schema::create('trainers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('job_title');
            $table->date('birth_date');
            $table->enum('gender', ['male', 'female']);
            $table->string('location', 255)->nullable();
            $table->string('phone', 15)->unique();
            $table->string('email')->unique();
            $table->string('image')->nullable();
            $table->text('experiences')->nullable();
            $table->text('certificates')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainers');
    }
};
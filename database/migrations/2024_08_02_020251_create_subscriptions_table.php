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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('package_id')->constrained('training_packages')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('trainer_id')->nullable()->constrained('trainers')->onDelete('set null')->onUpdate('cascade');
            $table->integer('age');
            $table->float('height');
            $table->float('weight');
            $table->string('whatsapp_phone', 15);
            $table->date('starting_date')->nullable();
            $table->enum('status', ['Pending', 'Paid', 'Cancelled'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->string('name');
            $table->string('email');
            $table->string('whatsapp_phone', 16);
            $table->date('starting_date')->nullable();
            $table->decimal('amount_paid', 8)->default(0);
            $table->enum('payment_status', ['Pending', 'Paid', 'Cancelled', 'Failed'])->default('Pending');
            $table->string('transaction_id')->nullable();
            $table->foreignId('package_id')->constrained('training_packages')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('duration_id')->constrained('training_package_durations')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('trainer_id')->nullable()->constrained('trainers')->onDelete('set null')->onUpdate('cascade');
            $table->timestamps();
        });
        // Set the auto-increment starting value to 1001
        DB::statement('ALTER TABLE subscriptions AUTO_INCREMENT = 1217;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};

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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_booking_id')->nullable(); 
            $table->string('transaction_id');
            $table->decimal('amount', 10, 2)->nullable();
            $table->string('currency',20)->nullable();
            $table->string('status')->nullable(); // 'success', 'pending', 'failed', etc.
            $table->string('payment_method')->nullable();
            $table->string('card_last_four')->nullable();
            $table->timestamp('payment_date')->nullable();
            $table->string('customer_email')->nullable();
            $table->json('metadata')->nullable();
            $table->foreign('patient_booking_id')->references('id')->on('patient_bookings');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};

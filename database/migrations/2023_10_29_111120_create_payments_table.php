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
            $table->decimal('amount', 10, 2); // Amount of the payment
            $table->string('currency', 3); // Currency code (e.g., USD, EUR)
            $table->string('status'); // Payment status (e.g., pending, success, failure)
            // Add more columns as needed for your specific use case
        
            // AIB-specific columns
            $table->string('aib_payment_id')->nullable(); // AIB payment ID
            $table->string('aib_transaction_id')->nullable(); // AIB transaction ID
            $table->foreign('patient_booking_id')->references('id')->on('patient_bookings')->onDelete('cascade');
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

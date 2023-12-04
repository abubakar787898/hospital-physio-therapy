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
        Schema::table('patient_bookings', function (Blueprint $table) {
                       $table->unsignedBigInteger('service_id')->nullable()->after('id'); 
                       $table->unsignedBigInteger('appointment_type_id')->nullable()->after('id'); 
                       $table->unsignedBigInteger('duration_id')->nullable()->after('id'); 
                       $table->unsignedBigInteger('payment_id')->nullable()->after('id'); 
                       $table->date('booking_date')->nullable()->after('service_id');
                       $table->time('booking_time')->nullable()->after('service_id');
                        $table->foreign('appointment_type_id')->references('id')->on('appointment_types');
                        $table->foreign('duration_id')->references('id')->on('durations');
                        $table->foreign('service_id')->references('id')->on('services');
                        $table->foreign('payment_id')->references('id')->on('payments');
                


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('patient_bookings', function (Blueprint $table) {
            //
        });
    }
};

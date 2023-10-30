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
        Schema::create('slots', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('appointment_type_id')->nullable(); 
            $table->date('date')->nullable();
            $table->string('from_time')->nullable();
            $table->string('to_time')->nullable();
            $table->enum('day_night', ['AM', 'PM'])->default('PM');
        $table->enum('status', ['available', 'booked'])->default('available');
        $table->foreign('appointment_type_id')->references('id')->on('appointment_types')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slots');
    }
};

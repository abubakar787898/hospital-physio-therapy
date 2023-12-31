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
        Schema::create('patient_bookings', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('slot_id')->nullable(); 

            $table->string('f_name',50);
            $table->string('l_name',50);
            $table->string('email',50);
            $table->string('mobile',30);
            $table->string('age',30);
            $table->text('comment');
            // $table->foreign('slot_id')->references('id')->on('slots')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_bookings');
    }
};

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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->enum('type', ['team', 'slider'])->default('team');
            $table->string('image')->nullable();
            $table->string('fb_link',100)->nullable();
            $table->string('youtube_link',100)->nullable();
            $table->string('insta_link',100)->nullable();
            $table->string('linkedin_link',100)->nullable();
            $table->string('twitter_link',100)->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};

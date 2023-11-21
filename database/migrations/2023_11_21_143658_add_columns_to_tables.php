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
        Schema::table('teams', function (Blueprint $table) {
            $table->string('speciality',20)->nullable()->after('title');
            $table->string('phone',100)->nullable()->after('title');
            $table->string('email',100)->nullable()->after('title');
            $table->string('experience',100)->nullable()->after('title');
        
        });
        Schema::table('pages', function (Blueprint $table) {
          
            $table->text('description_1')->nullable()->after('title');
            $table->text('description_2')->nullable()->after('title');
            $table->text('description_3')->nullable()->after('title');
            $table->text('description_4')->nullable()->after('title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->dropColumn('speciality');
            $table->dropColumn('phone');
            $table->dropColumn('email');
            $table->dropColumn('experience');
        });
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn('description_1');
            $table->dropColumn('description_2');
            $table->dropColumn('description_3');
            $table->dropColumn('description_4');
        });
    }
};

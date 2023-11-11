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
        Schema::create('officerinfo', function (Blueprint $table) {
            $table->id('ono');
            $table->string('offId', 50);
            $table->string('offFname', 20);
            $table->string('offMname', 15)-> nullable();
            $table->string('offLname', 20);
            $table->string('offSuffix', 5)->nullable();
            $table->string('offContact', 20);
            // $table->boolean('notification');
            $table->string('offAddress', 100);
            $table->date('offDob');
            $table->string('offGender', 6);
            $table->string('offEmail')->unique();
            $table->string('offpassword');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('officerinfo');
    }
};

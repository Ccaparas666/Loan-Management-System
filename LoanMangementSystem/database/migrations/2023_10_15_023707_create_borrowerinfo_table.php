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
        Schema::create('borrowerinfo', function (Blueprint $table) {
            $table->id('bno');
            $table->string('borAccount');
            $table->string('borFname', 20);
            $table->string('borMname', 15)-> nullable();
            $table->string('borLname', 20);
            $table->string('borSuffix', 5)->nullable();
            $table->string('borContact', 20);
            $table->string('borEmail', 100)->unique();
            $table->date('borDob');
            $table->string('loanstatus')->default('Not Registered');
            $table->string('borAddress', 100);
            $table->string('borGender', 15);
            $table->string('borPicture')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowerinfo');
    }
};

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
        Schema::create('paymentInfo', function (Blueprint $table) {
            $table->id('pno');
            $table->unsignedBigInteger('loan_id')->unsigned(); // Foreign key referencing loans table
            $table->decimal('Remaining_Balance', 10, 2); // Payment amount
            $table->date('due_date'); // Date of the payment
            $table->timestamps();

            $table->foreign('loan_id')->references('lid')->on('loanInfo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paymentInfo');
    }
};

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
        Schema::create('loanInfo', function (Blueprint $table) {
            $table->id('lid');
            $table->unsignedBigInteger('bno');
            $table->string('approved_by')->nullable();
            $table->string('rejected_by')->nullable();
            $table->string('created_by')->nullable();
            $table->string('loanNumber', 50);
            $table->string('Reason')->nullable();
            $table->decimal('LoanAmount', $precision = 8, $scale = 2);
            $table->decimal('InterestRate', $precision = 8, $scale = 2);
            $table->date('LoanApplication')->nullable();
            $table->date('loan_approval_date')->nullable();
            $table->date('cash_release_date')->nullable();
            $table->string('loanstatus')->default('Not Registered');
            $table->string('cmName');
            $table->string('cmContact');
            $table->string('cmEmail', 100);
            $table->string('cmAddress', 100);
            $table->timestamps();
            $table->foreign('bno')->references('bno')->on('borrowerinfo');
        });

    }

    /**
     * Reverse the migrations.
     * $table->integer('LoanTerm');    
     */
    public function down(): void
    {
        Schema::dropIfExists('loanInfo');
    }
};

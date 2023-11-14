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
            $table->integer('LoanTerm');    
            $table->decimal('LoanAmount', $precision = 8, $scale = 2);
            $table->decimal('InterestRate', $precision = 8, $scale = 2);
            $table->date('LoanApplication');
            $table->date('LoanApproval');
            $table->date('LoanDisbursement');
            $table->string('loanstatus', 20);
            $table->string('Colateral', 20);
            $table->string('coMaker', 20);
            $table->timestamps();
            $table->foreign('bno')->references('bno')->on('borrowerinfo');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loanInfo');
    }
};

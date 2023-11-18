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
            $table->string('loanNumber', 50);
            $table->integer('LoanTerm');    
            $table->decimal('LoanAmount', $precision = 8, $scale = 2);
            $table->decimal('InterestRate', $precision = 8, $scale = 2);
            $table->date('LoanApplication');
            $table->string('loanstatus')->default('Waiting For Approval');
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
     */
    public function down(): void
    {
        Schema::dropIfExists('loanInfo');
    }
};

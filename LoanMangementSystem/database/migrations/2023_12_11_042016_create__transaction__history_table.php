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
        Schema::create('Transaction_History', function (Blueprint $table) {
            $table->id('TH');
        $table->timestamp('PaymentDate')->nullable();
        $table->string('PaymentAmount')->nullable();
        $table->string('RemainingBalance')->nullable();
        $table->string('ReferenceNumber');
        $table->unsignedBigInteger('borrower_id')->nullable();
        $table->timestamps();
        $table->foreign('borrower_id')->references('bno')->on('borrowerinfo')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Transaction_History');
    }
};

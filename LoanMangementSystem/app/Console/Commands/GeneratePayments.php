<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\LoanInfo;
use App\Models\paymentInfo;
use Carbon\Carbon;

class GeneratePayments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:pay';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate payments for due loans';

    /**
     * Execute the console command.
     */
 
     public function handle()
     {
         $dueLoans = LoanInfo::join('paymentInfo', 'loanInfo.lid', '=', 'paymentInfo.loan_id')
             ->where('paymentInfo.due_date', '<', now())
             ->select('loanInfo.*', 'paymentInfo.Remaining_Balance')
             ->distinct()
             ->get();
     
         foreach ($dueLoans as $loan) {
             // Get the latest due date and balance for this loan ID
             $latestPayment = PaymentInfo::where('loan_id', $loan->lid)
                 ->orderBy('due_date', 'desc')
                 ->first();
     
             if ($latestPayment) {
                 $latestDueDate = $latestPayment->due_date;
                 $latestBalance = $latestPayment->Remaining_Balance;
     
                 // Check if today's date is after the latest due date
                 if (Carbon::now()->gt($latestDueDate)) {
                     // Create a new payment record with the updated balance and due date
                     $Interest = $loan->InterestRate / 100;
                     $remainingBalance = $latestBalance;
     
                     // Calculate the updated balance with accumulated interest
                     $updatedBalance = ($Interest * $remainingBalance) + $remainingBalance;
     
                     $payment = new PaymentInfo();
                     $payment->loan_id = $loan->lid;
                     $payment->remaining_balance = $updatedBalance;
                     $payment->due_date = Carbon::now()->addMonth();
                     $payment->save();
                 }
             }
         }
         \Log::info('Generate Payments Command started at ' . now());
         $this->info('Payments generated successfully.');
     }
     



 
    
}

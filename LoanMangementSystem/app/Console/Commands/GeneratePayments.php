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
    protected $signature = 'generate:payments';

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
             ->select('loanInfo.*', 'paymentInfo.Remaining_Balance') // Include Remaining_Balance in the selection
             ->distinct()
             ->get();
     
         foreach ($dueLoans as $loan) {

            $Interest = $loan->InterestRate/100;
            $remainingBalance = $loan->Remaining_Balance;

            $balance = ($Interest *  $remainingBalance) + $remainingBalance;
             $payment = new paymentInfo();
             $payment->loan_id = $loan->lid; // Assuming 'lid' is the primary key of the loanInfo table
             $payment->remaining_balance = $balance; // Initial remaining balance is the full loan amount
             $payment->due_date = Carbon::now()->addMonth(); // Initial due date is one month from now
             $payment->save();
         }
     
         $this->info('Payments generated successfully.');
     }

 
    
}

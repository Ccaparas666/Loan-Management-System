<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\LoanInfo;
use App\Models\paymentInfo;
use Carbon\Carbon;
use App\Mail\MailDemo;
use Illuminate\Support\Facades\Mail as FacadesMail;

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
        // $dueLoans = LoanInfo::join('paymentInfo', 'loanInfo.lid', '=', 'paymentInfo.loan_id')
        //     ->join('borrowerInfo', 'loanInfo.bno', '=', 'borrowerInfo.bno') // Add this join
        //     ->where('paymentInfo.due_date', '<', now())
        //     ->select('loanInfo.*', 'paymentInfo.Remaining_Balance', 'borrowerInfo.borEmail') // Include the email column
        //     ->distinct()
        //     ->get();

        $dueLoans = LoanInfo::join('paymentInfo', 'loanInfo.lid', '=', 'paymentInfo.loan_id')
            ->join('borrowerInfo', 'loanInfo.bno', '=', 'borrowerInfo.bno')
            ->where('paymentInfo.due_date', '<', now())
            ->select('loanInfo.*', 'paymentInfo.Remaining_Balance', 'borrowerInfo.borEmail', 'borrowerInfo.borFname', 'borrowerInfo.borLname', 'borrowerInfo.borAccount',)
            ->get()
            ->groupBy('lid', 'bno');


        foreach ($dueLoans as $dueLoan) {

            $dueLoan = $dueLoan->first();
            // Get the latest due date and balance for this loan ID
            $latestPayment = PaymentInfo::where('loan_id', $dueLoan->lid)
                ->orderBy('due_date', 'desc')
                ->first();

            if ($latestPayment) {
                $latestDueDate = $latestPayment->due_date;
                $latestBalance = $latestPayment->Remaining_Balance;

                // Check if today's date is after the latest due date
                if (Carbon::now()->gt($latestDueDate)) {
                    // Create a new payment record with the updated balance and due date
                    $Interest = $dueLoan->InterestRate / 100;
                    $remainingBalance = $latestBalance;

                    // Calculate the updated balance with accumulated interest
                    $updatedBalance = ($Interest * $remainingBalance) + $remainingBalance;

                    $payment = new PaymentInfo();
                    $payment->loan_id = $dueLoan->lid;
                    $payment->remaining_balance = $updatedBalance;
                    $payment->due_date = Carbon::now()->addMonth();
                    $payment->save();

                    $email = $dueLoan->borEmail;
                    $latestDueDate = Carbon::parse($latestPayment->due_date);
                    $sendMailData = [
                        'emailType' => 'PaymentReminder',
                        'BorrowerName' => $dueLoan->borFname . ' ' . $dueLoan->borLname,
                        'accountnumber' => $dueLoan->borAccount,
                        'loanNumber' => $dueLoan->loanNumber,
                        'loanAmount' => $dueLoan->LoanAmount,
                        'remainingBalance' => $updatedBalance,
                        'dueDate' => $latestDueDate->toDateString(),
                        'loanStatus' => $dueLoan->loanstatus,
                    ];

                    // FacadesMail::to($email)->send(new MailDemo($sendMailData));



                    \Log::info('Generated Payment Data', [
                        'BorrowerName' => $dueLoan->borFname . ' ' . $dueLoan->borLname,
                        'accountnumber' => $dueLoan->borAccount,
                        'loanNumber' => $dueLoan->loanNumber,
                        'loanAmount' => $dueLoan->LoanAmount,
                        'remainingBalance' => $updatedBalance,
                        'dueDate' => $latestDueDate->toDateString(),
                        'loanStatus' => $dueLoan->loanstatus,
                    ]);
                }
            }
        }

        \Log::info('Generate Payments Command started at ' . now());
        $this->info('Payments generated successfully.');
    }







}

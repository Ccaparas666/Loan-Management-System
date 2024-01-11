<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\LoanInfo;
use App\Models\paymentInfo;
use Carbon\Carbon;
use App\Mail\MailDemo;
use App\Mail\CoMakerMail;
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
       

        $dueLoans = LoanInfo::join('paymentInfo', 'loanInfo.lid', '=', 'paymentInfo.loan_id')
            ->join('borrowerInfo', 'loanInfo.bno', '=', 'borrowerInfo.bno')
            ->where('paymentInfo.due_date', '<', now())
            ->select('loanInfo.*', 'paymentInfo.*', 'borrowerInfo.*', )
            ->get()
            ->groupBy('lid', 'bno');


    //         $dueLoans = LoanInfo::join('paymentInfo', 'loanInfo.lid', '=', 'paymentInfo.loan_id')
    // ->join('borrowerInfo', 'loanInfo.bno', '=', 'borrowerInfo.bno')
    // ->select('loanInfo.*', 'paymentInfo.*', 'borrowerInfo.*')
    // ->get()
    // ->groupBy('lid', 'bno');
            
           

        foreach ($dueLoans as $dueLoan) {
          
            $dueLoan = $dueLoan->first();
            // Get the latest due date and balance for this loan ID
            $latestPayment = PaymentInfo::where('loan_id', $dueLoan->lid)
                ->orderBy('due_date', 'desc')
                ->first();
            
            if ($latestPayment) {
                $latestDueDate = $latestPayment->due_date;
                $latest3Days = Carbon::parse($latestPayment->due_date)->subDays(3);
               

                $latestBalance = $latestPayment->Remaining_Balance;
                if ($latestBalance > 0) {
                    // Check if today's date is after the latest due date
                    if (Carbon::now()->gt($latestDueDate)) {
                        // Create a new payment record with the updated balance and due date
                        $Interest = $dueLoan->InterestRate / 100;
                        $remainingBalance = $latestBalance;

                        $interestDisplay = intval($dueLoan->InterestRate);



                        // Calculate the updated balance with accumulated interest
                        $updatedBalance = ($Interest * $remainingBalance) + $remainingBalance;

                        $payment = new PaymentInfo();
                        $payment->loan_id = $dueLoan->lid;
                        $payment->remaining_balance = $updatedBalance;
                        $payment->due_date = Carbon::parse($latestDueDate)->addMonth();
                        // $payment->save();

                        $email = $dueLoan->borEmail;
                        $coemail = $dueLoan->cmEmail;
                        $latestDueDate = Carbon::parse($latestPayment->due_date);
                        $sendMailData = [
                            'emailType' => 'PaymentReminder',
                            'BorrowerName' => $dueLoan->borFname . ' ' . $dueLoan->borLname,
                            'accountnumber' => $dueLoan->borAccount,
                            'loanNumber' => $dueLoan->loanNumber,
                            'InterestRate' => $dueLoan->InterestRate,
                            'LoanBalance' => $remainingBalance,
                            'BalanceAdded' => $remainingBalance. ' * ' . $interestDisplay . '% = PHP ' . ($Interest * $remainingBalance),
                            'remainingBalance' => $updatedBalance,
                            'dueDate' => $latestDueDate->toDateString(),
                            'updateDue' => $latestDueDate->addMonth()->toDateString(),
                            'loanStatus' => 'PaymentReminder',
                            'loanstatus' => $dueLoan->borrowerInfo->loanstatus,
                            'Comaker' => $dueLoan->cmName,
                            'cmContact' => $dueLoan->cmContact,
                            'cmEmail' => $dueLoan->cmEmail,
                            'cmAddress' => $dueLoan->cmAddress,
                        ];
                        $sendCoMaker = [
                            //Borrower Details
                            'BorrowerName' => $dueLoan->borFname . ' ' . $dueLoan->borLname,
                            'BorrowerContact' => $dueLoan->borContact,
                            'BorrowerEmail' => $dueLoan->borEmail,
                            'BorrowerAddress' => $dueLoan->borAddress,
                            
                
                            //Loan Details
                            'InterestRate' => $dueLoan->InterestRate,
                            'LoanBalance' => $remainingBalance,
                            'BalanceAdded' => $remainingBalance. ' * ' . $interestDisplay . '% = PHP ' . ($Interest * $remainingBalance),
                            'remainingBalance' => $updatedBalance,
                            'dueDate' => $latestDueDate->toDateString(),
                            'updateDue' => $latestDueDate->addMonth()->toDateString(),
                            'loanStatus' => $dueLoan->borrowerInfo->loanstatus,
                            'accountnumber' => $dueLoan->borAccount,
                            'loanNumber' => $dueLoan->loanNumber,
                
                            //Co-Maker Details
                            'Comaker' => $dueLoan->cmName,
                            'cmContact' => $dueLoan->cmContact,
                            'cmEmail' => $dueLoan->cmEmail,
                            'cmAddress' => $dueLoan->cmAddress,
                
                            'emailType' => 'LoanUpdate',
                        ];
                        // dd( $sendCoMaker);
                        try {
                            // Attempt to send the email
                            FacadesMail::to($coemail)->send(new CoMakerMail($sendCoMaker));
                             FacadesMail::to($email)->send(new MailDemo($sendMailData));
                            //  dd($sendMailData);
                             activity()->log('Payments generated successfully.');

                        } catch (\Exception $e) {
                            // Log the error or handle it as needed
                            \Log::error('Email sending failed: ' . $e->getMessage());
                            // You can customize this part based on your error handling strategy
                        }
                       
                    }
                   if (Carbon::now()->eq($latest3Days)) {
                        // Create a new payment record with the updated balance and due date
                        $Interest = $dueLoan->InterestRate / 100;
                        $remainingBalance = $latestBalance;

                        $interestDisplay = intval($dueLoan->InterestRate);

                        $email = $dueLoan->borEmail;
                        $coemail = $dueLoan->cmEmail;
                        $latestDueDate = Carbon::parse($latestPayment->due_date);
                        $sendMailData = [
                            //Borrower Details
                            'Borrowerasdasd'=>'This is 3 days before due email',
                            'BorrowerName' => $dueLoan->borFname . ' ' . $dueLoan->borLname,
                            'accountnumber' => $dueLoan->borAccount,
                            'loanstatus' => $dueLoan->borrowerInfo->loanstatus,
                            //Loan Details
                            'loanNumber' => $dueLoan->loanNumber,
                            'InterestRate' => $dueLoan->InterestRate,
                            'LoanBalance' => $remainingBalance,
                            'dueDate' => $latestDueDate->toDateString(),
                            
                            //Co-Maker Details
                            'Comaker' => $dueLoan->cmName,
                            'cmContact' => $dueLoan->cmContact,
                            'cmEmail' => $dueLoan->cmEmail,
                            'cmAddress' => $dueLoan->cmAddress,

                            'emailType' => 'paymentDueReminder',
                            'loanStatus' => '5111',
                        ];
                        $sendCoMaker = [
                            //Borrower Details
                            'BorrowerName' => $dueLoan->borFname . ' ' . $dueLoan->borLname,
                            'accountnumber' => $dueLoan->borAccount,
                            'loanstatus' => $dueLoan->borrowerInfo->loanstatus,
                            //Loan Details
                            'loanNumber' => $dueLoan->loanNumber,
                            'InterestRate' => $dueLoan->InterestRate,
                            'LoanBalance' => $remainingBalance,
                            'dueDate' => $latestDueDate->toDateString(),
                            
                            //Co-Maker Details
                            'Comaker' => $dueLoan->cmName,
                            'cmContact' => $dueLoan->cmContact,
                            'cmEmail' => $dueLoan->cmEmail,
                            'cmAddress' => $dueLoan->cmAddress,
                
                            'emailType' => 'LoanUpdate',
                        ];
                        try {
                            // Attempt to send the email
                            // FacadesMail::to($coemail)->send(new CoMakerMail($sendCoMaker));
                            //  FacadesMail::to($email)->send(new MailDemo($sendMailData));
                             dd($sendMailData);
                             activity()->log('payment due date.');

                        } catch (\Exception $e) {
                            // Log the error or handle it as needed
                            \Log::error('Email sending failed: ' . $e->getMessage());
                            // You can customize this part based on your error handling strategy
                        }
                    }
                    
                }
            }
        }


        // foreach ($test  as $dueLoan) {
          
        //     $dueLoan = $dueLoan->first();
        //     // Get the latest due date and balance for this loan ID
        //     $latestPayment = PaymentInfo::where('loan_id', $dueLoan->lid)
        //         ->orderBy('due_date', 'desc')
        //         ->first();
            
        //     if ($latestPayment) {
        //         $latestDueDate = $latestPayment->due_date;
        //         $latest3Days = Carbon::parse($latestPayment->due_date)->subDays(3);
               

        //         $latestBalance = $latestPayment->Remaining_Balance;
        //         if ($latestBalance > 0) {
        //             // Check if today's date is after the latest due date
        //            if (Carbon::now()->eq($latest3Days)) {
        //                 // Create a new payment record with the updated balance and due date
        //                 $Interest = $dueLoan->InterestRate / 100;
        //                 $remainingBalance = $latestBalance;

        //                 $interestDisplay = intval($dueLoan->InterestRate);

        //                 $email = $dueLoan->borEmail;
        //                 $coemail = $dueLoan->cmEmail;
        //                 $latestDueDate = Carbon::parse($latestPayment->due_date);
        //                 $sendMailData = [
        //                     //Borrower Details
        //                     'Borrowerasdasd'=>'This is 3 days before due email',
        //                     'BorrowerName' => $dueLoan->borFname . ' ' . $dueLoan->borLname,
        //                     'accountnumber' => $dueLoan->borAccount,
        //                     'loanstatus' => $dueLoan->borrowerInfo->loanstatus,
        //                     //Loan Details
        //                     'loanNumber' => $dueLoan->loanNumber,
        //                     'InterestRate' => $dueLoan->InterestRate,
        //                     'LoanBalance' => $remainingBalance,
        //                     'dueDate' => $latestDueDate->toDateString(),
                            
        //                     //Co-Maker Details
        //                     'Comaker' => $dueLoan->cmName,
        //                     'cmContact' => $dueLoan->cmContact,
        //                     'cmEmail' => $dueLoan->cmEmail,
        //                     'cmAddress' => $dueLoan->cmAddress,

        //                     'emailType' => '123',
        //                     'loanStatus' => '5111',
        //                 ];
        //                 $sendCoMaker = [
        //                     //Borrower Details
        //                     'BorrowerName' => $dueLoan->borFname . ' ' . $dueLoan->borLname,
        //                     'accountnumber' => $dueLoan->borAccount,
        //                     'loanstatus' => $dueLoan->borrowerInfo->loanstatus,
        //                     //Loan Details
        //                     'loanNumber' => $dueLoan->loanNumber,
        //                     'InterestRate' => $dueLoan->InterestRate,
        //                     'LoanBalance' => $remainingBalance,
        //                     'dueDate' => $latestDueDate->toDateString(),
                            
        //                     //Co-Maker Details
        //                     'Comaker' => $dueLoan->cmName,
        //                     'cmContact' => $dueLoan->cmContact,
        //                     'cmEmail' => $dueLoan->cmEmail,
        //                     'cmAddress' => $dueLoan->cmAddress,
                
        //                     'emailType' => 'LoanUpdate',
        //                 ];
        //                 try {
        //                     // Attempt to send the email
        //                     // FacadesMail::to($coemail)->send(new CoMakerMail($sendCoMaker));
        //                     //  FacadesMail::to($email)->send(new MailDemo($sendMailData));
        //                      dd($sendMailData);
        //                      activity()->log('payment due date.');

        //                 } catch (\Exception $e) {
        //                     // Log the error or handle it as needed
        //                     \Log::error('Email sending failed: ' . $e->getMessage());
        //                     // You can customize this part based on your error handling strategy
        //                 }
        //             }
                    
        //         }
        //     }
        // }

        \Log::info('Generate Payments Command started at ' . now());
        $this->info('Payments generated successfully222.');
    }







}

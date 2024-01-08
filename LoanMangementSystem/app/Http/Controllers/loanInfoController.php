<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\loanInfo;
use App\Models\borrowerinfo;
use App\Models\paymentInfo;
use App\Models\officerInfo;
use App\Models\User;
use App\Models\Transaction_History;
use App\Helpers\Helper;
use Psy\Readline\Hoa\Console;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Mail;
use App\Mail\MailDemo;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Illuminate\Support\Facades\DB;


use App\Models\loansettings;

class loanInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $loansettings = loansettings::all()->sortBy('interest');
        $search = $request->search;
       

        $genId = Helper::LoanNumberGenerator(new loanInfo, 'loanNumber', 5, 'LNO');

        $loanInfo = loanInfo::join('borrowerinfo', 'loanInfo.bno', '=', 'borrowerinfo.bno')->get();

        $data = borrowerinfo::where('borAccount', 'Like', $search)->get();

        return view('Loan.index', compact('loanInfo', 'data', 'search', 'genId', 'loansettings'));
    }

    public function LoanRegister(Request $request, string $brno)
    {

        // Redirect to the search route with the 'brno' parameter
        return redirect()->route('search', ['brno' => $brno])->with('success', 'Borrower Match Found');
    }
    public function search(Request $request, string $brno = null)
    {


        if ($borrowerinfo = borrowerinfo::where('borAccount', 'like', $brno)->first()) {
            $search = $brno;
        } else {

            $search = $request->search;
        }



        if ($search == '') {
            return redirect()->route('Loan')->with('error', 'Account Number Does Not Exist');
        } else {
            // Fetch the borrower info
            $borrowerinfo = BorrowerInfo::where('borAccount', $search)->first();
        
            // Check if borrowerinfo exists
            if (!$borrowerinfo) {
                return redirect()->route('Loan')->with('error', 'Account Number Does Not Exist');
            }
        
            // Check loan status
            if ($borrowerinfo->loanstatus != 'Not Registered' && $borrowerinfo->loanstatus != 'PAID') {
                return redirect()->route('Loan')->with('errorFound', 'Borrower already registered for a loan');
            } elseif ($borrowerinfo->loanstatus == 'PAID') {
                $genId = Helper::LoanNumberGenerator(new loanInfo, 'loanNumber', 5, 'LNO');
                $loanInfo = loanInfo::join('borrowerinfo', 'loanInfo.bno', '=', 'borrowerinfo.bno')->get();
        
            return redirect()->route('Loan', compact('loanInfo', 'search', 'genId', 'borrowerinfo'))->with('success', 'Borrower Re-Apply');
            }
        
            // The rest of your code
            $genId = Helper::LoanNumberGenerator(new loanInfo, 'loanNumber', 5, 'LNO');
            $loanInfo = loanInfo::join('borrowerinfo', 'loanInfo.bno', '=', 'borrowerinfo.bno')->get();
        
            return redirect()->route('Loan', compact('loanInfo', 'search', 'genId', 'borrowerinfo'))->with('success', 'Borrower Match Found');
        }
    }




    public function newloan()
    {

        // $loanInfo = loanInfo::join('borrowerinfo', 'loanInfo.bno', '=', 'borrowerinfo.bno')->get();
        $loanInfo = loanInfo::join('borrowerinfo', 'loanInfo.bno', '=', 'borrowerinfo.bno')
    ->join(DB::raw('(SELECT bno, MAX(created_at) AS latest_date FROM loanInfo GROUP BY bno) AS latestLoan'), function ($join) {
        $join->on('loanInfo.bno', '=', 'latestLoan.bno')
            ->on('loanInfo.created_at', '=', 'latestLoan.latest_date');
    })
    ->select('loanInfo.*')
    ->get();


        if ($loanInfo->isNotEmpty()) {
            $loanInfo = $loanInfo->map(function ($loan) {
                $interestRate = $loan->InterestRate / 100;
                $amount = $loan->LoanAmount;
                $loan->monthlyPayment = (($amount * $interestRate) + $amount);
                return $loan;
            });
        }

        return view('Loan.newloan', compact('loanInfo'));
    }
    public function StatusApprove(Request $request, string $id)
    {
        $approvedBy = auth()->user()->name;
    loanInfo::where('lid', $id)
        ->update([
            'approved_by' => $approvedBy,
        ]);
        ///////////////
        $loan = LoanInfo::findOrFail($id);    
        ///////////////////////////
        if ($loan->borrowerInfo) {
            $loan->borrowerInfo->update([
                'loanstatus' => 'Approved',
            ]); 
        } else {
            return back()->with('error', 'Loan Not Approved Try Again');
        }
        $loan = loanInfo::with('borrowerinfo')->where('lid', $id)->first();
        if ($loan && $loan->borrowerinfo) {
            $loan->loan_approval_date = Carbon::now();
            $loan->save();
            $sendMailData = [
                'BorrowerName' => $loan->borrowerinfo->borFname,
                'accountnumber' => $loan->borrowerinfo->borAccount,
                'loanNumber' => $loan->loanNumber,
                'loanAmount' => $loan->LoanAmount,
                'loanStatus' => 'Approved',
                'emailType' => 'LoanStatusUpdate',
            ];
            
            // FacadesMail::to($loan->borrowerinfo->borEmail)->send(new MailDemo($sendMailData));
             // Log the approval activity
            $user = auth()->user();
        $logMessage = "Loan {$loan->loanNumber} approved by {$approvedBy}";

        activity()
            ->performedOn($loan)
            ->causedBy($user)
            ->log($logMessage);
        } else {

            return back()->with('error', 'Loan or borrower information not found');
        }
        return back()->with('success', 'Approved Loan');

    }
    public function StatusReject(Request $request, string $id)
    {
        $RejectedBy = auth()->user()->name;
        $loanInfo = loanInfo::where('lid', $id)
            ->update(
                [
                    'Reason' => $request->reason,
                    'rejected_by' => $RejectedBy,
                ]
            );

            $loan = LoanInfo::findOrFail($id);    
        ///////////////////////////
        if ($loan->borrowerInfo) {
            $loan->borrowerInfo->update([
                'loanstatus' => 'Rejected',
                'Reason' => $request->reason,
            ]); 
        } else {
            return back()->with('error', 'Loan Not Approved Try Again');
        }

        $loan = loanInfo::with('borrowerinfo')->where('lid', $id)->first();
        if ($loan && $loan->borrowerinfo) {
            $sendMailData = [
                'BorrowerName' => $loan->borrowerinfo->borFname,
                'accountnumber' => $loan->borrowerinfo->borAccount,
                'loanNumber' => $loan->loanNumber,
                'loanAmount' => $loan->LoanAmount,
                'loanStatus' => 'Rejected',
                'emailType' => 'LoanStatusUpdate',
            ];

            // FacadesMail::to($loan->borrowerinfo->borEmail)->send(new MailDemo($sendMailData));
        } else {

            return back()->with('error', 'Loan or borrower information not found');
        }
         // Log the rejection activity
         $user = auth()->user();
         $logMessage = "Loan {$loan->loanNumber} rejected by {$user->name}";
 
         activity()
             ->performedOn($loan)
             ->causedBy($user)
             ->log($logMessage);
        return back()->with('reject', 'Rejected Loan');


    }


    public function rejected()
    {

        // $loanInfo = loanInfo::join('borrowerinfo', 'loanInfo.bno', '=', 'borrowerinfo.bno')->get();
        $loanInfo = loanInfo::join('borrowerinfo', 'loanInfo.bno', '=', 'borrowerinfo.bno')
    ->join(DB::raw('(SELECT bno, MAX(created_at) AS latest_date FROM loanInfo GROUP BY bno) AS latestLoan'), function ($join) {
        $join->on('loanInfo.bno', '=', 'latestLoan.bno')
            ->on('loanInfo.created_at', '=', 'latestLoan.latest_date');
    })
    ->select('loanInfo.*')
    ->get();

        if ($loanInfo->isNotEmpty()) {
            $loanInfo = $loanInfo->map(function ($loan) {
                $interestRate = $loan->InterestRate / 100;
                $amount = $loan->LoanAmount;
                $loan->monthlyPayment = (($amount * $interestRate) + $amount);
                return $loan;
            });
        }
        return view('Loan.rejected', compact('loanInfo'));
    }

    public function approved()
    {
        $loanInfo = loanInfo::join('borrowerinfo', 'loanInfo.bno', '=', 'borrowerinfo.bno')
    ->join(DB::raw('(SELECT bno, MAX(created_at) AS latest_date FROM loanInfo GROUP BY bno) AS latestLoan'), function ($join) {
        $join->on('loanInfo.bno', '=', 'latestLoan.bno')
            ->on('loanInfo.created_at', '=', 'latestLoan.latest_date');
    })
    ->select('loanInfo.*')
    ->get();

        if ($loanInfo->isNotEmpty()) {
            $loanInfo = $loanInfo->map(function ($loan) {
                $interestRate = $loan->InterestRate / 100;
                $amount = $loan->LoanAmount;

                $loan->monthlyPayment = (($amount * $interestRate) + $amount);
                return $loan;
            });

        }
        return view('Loan.approved', compact('loanInfo'));
    }

    public function Released(Request $request, string $id)
    {
      

        

        $loan = loanInfo::with('borrowerinfo')->where('lid', $id)->first();
        if ($loan && $loan->borrowerinfo) {
            $release_date = $request->ReleaseDate;
            $formattedDate = Carbon::createFromFormat('M d, Y', $release_date)->format('Y-m-d');    
            
            $loan->cash_release_date = $formattedDate;
            

            $payment = new paymentInfo();
            $payment->loan_id = $loan->lid;
            $payment->remaining_balance = ($loan->LoanAmount * ($loan->InterestRate / 100)) + $loan->LoanAmount;
            $payment->due_date = Carbon::parse($formattedDate)->addMonth();
            $payment->save();
            $loan->save();

            $loan = LoanInfo::findOrFail($id);    
        
        if ($loan->borrowerInfo) {
            $loan->borrowerInfo->update([
                'loanstatus' => 'Loan Active',
            ]); 
        } 

        }
        $user = auth()->user();
        $logMessage = "Loan {$loan->loanNumber} released by {$user->name}";

        activity()
            ->performedOn($loan)
            ->causedBy($user)
            ->log($logMessage);

        return back()->with('Released', 'Loan Released');
    }



    public function paid()
    {

        $loanInfo = loanInfo::join('borrowerinfo', 'loanInfo.bno', '=', 'borrowerinfo.bno')
            ->get();
        if ($loanInfo->isNotEmpty()) {
            $loanInfo = $loanInfo->map(function ($loan) {
                $interestRate = $loan->InterestRate / 100;
                $amount = $loan->LoanAmount;
                $loan->monthlyPayment = (($amount * $interestRate) + $amount);
                return $loan;
            });
        }
        return view('Loan.Loan', compact('loanInfo'));
    }

    public function payment()
    {
        if (session()->has('data')) {
            $data = session('data');
            return view('Loan.payment', compact('data'));
        } else {
            return view('Loan.payment');
        }
    }


    public function loanSearch(Request $request)
    {
        $search = $request->input('search');

        $data = loanInfo::join('borrowerinfo', 'loanInfo.bno', '=', 'borrowerinfo.bno')
            ->where('loanInfo.loanNumber', 'LIKE', '%' . $search . '%')
            ->get(['loanInfo.*', 'borrowerinfo.borFname', 'borrowerinfo.borMname', 'borrowerinfo.borLname', 'borrowerinfo.borSuffix']);

        if ($data->count() > 0) {
            return redirect()->route('payment')->with(['data' => $data, 'success' => 'Loan Number Match Found']);
        } else {
            return redirect()->route('payment')->with('error', 'LOAN NUMBER NOT FOUND, Loan Number Example (LNO-0000X)');
        }
    }




    // public function RoutePayment(Request $request, $bno)
    // {
    //     if ($request->isMethod('post')) {
    //         // Validate the form input
    //         $request->validate([
    //             'PayAmount' => ['required', 'numeric', 'min:0.01', 'regex:/^\d+(\.\d{1,2})?$/'],
    //             'Money' => 'required|numeric|min:0.01',
    //         ]);

    //         // Find the borrower information
    //         $borrowerinfo = BorrowerInfo::with('loans.payments')->where('bno', $bno)->first();

    //         // Get the latest loan and its payments
    //         $loan = $borrowerinfo->loans->first();
    //         $payments = $loan->payments;

    //         // Calculate the remaining balance
    //         $payAmount = $request->input('PayAmount');
    //         $moneyGiven = $request->input('Money');
    //         $Remaining_Balance = $payments->last()->Remaining_Balance - $payAmount;

    //         // Validate that the payment amount is not greater than the remaining balance
    //         if ($payAmount > $moneyGiven) {
    //             return redirect()->back()->with('error', 'Given Money amount cannot be greater than the Pay Amount.');
    //         }
    //         $tolerance = 0.01;
    //         if ($payAmount > $payments->last()->Remaining_Balance) {
    //             return redirect()->back()->with('error', 'Remaining Balance cannot be greater than the Pay Amount.');
    //         }

    //         if ($Remaining_Balance <= 0) {
    //             // Get the specific loan associated with the borrower
    //             $loanInfo = $borrowerinfo->loans->first();
            
    //             if ($loanInfo) {
    //                 // Update the loan status to 'PAID' through the relationship
    //                 $loanInfo->borrowerinfo()->update(['loanstatus' => 'PAID']);
    //             }
    //         }

    //         $changeAmount = $moneyGiven - $payAmount;

    //         // Update the remaining balance in the payment record
    //         $latestPayment = $payments->last();
    //         $latestPayment->Remaining_Balance = $Remaining_Balance;
    //         $latestPayment->save();
            
    //         $Transaction = new Transaction_History();
            
    //         $Transaction->PaymentDate = now();
    //         $Transaction->PaymentAmount = $payAmount;
    //         $Transaction->RemainingBalance = $Remaining_Balance;
            
    //         // Generate or obtain a unique reference number
    //         $Transaction->ReferenceNumber = Helper::generateUniqueReference();
            
    //         // Assign the actual borrower ID
    //         $Transaction->borrower_id = $borrowerinfo->bno;
            
    //         if (!$Transaction->save()) {
    //             return redirect()->back()->with('error', 'Failed to record the transaction.');
    //         }
    //         $Transaction->save();
           

    //         // Loan Status Update


    //         return redirect()->back()->with('paySuccess', 'Change: ' .  $changeAmount);
            
    //     }

    //     // If the form is not submitted, continue with your existing code to display the payment information
    //     $test = 'test2';
    //     $borrowerinfo = BorrowerInfo::with('loans')->where('bno', $bno)->first();

    //     return view('Loan.payment', compact('borrowerinfo', 'test'));
    // }



    // In your LoanInfo model

public function latestLoanForBorrower($borrowerId)
{
    return $this->where('bno', $borrowerId)
        ->latest('created_at')
        ->first();
}

// In your controller

public function RoutePayment(Request $request, $bno)
{
    if ($request->isMethod('post')) {
        // Validate the form input
        $request->validate([
            'PayAmount' => ['required', 'numeric', 'min:0.01', 'regex:/^\d+(\.\d{1,2})?$/'],
            'Money' => 'required|numeric|min:0.01',
        ]);

        // Find the borrower information
        $borrowerinfo = BorrowerInfo::with('loans.payments')->where('bno', $bno)->first();

        // Get the latest loan for the borrower
        $latestLoan = LoanInfo::latestLoanForBorrower($bno);

        // Get the payments for the latest loan
        $payments = $latestLoan->payments;

        // Calculate the remaining balance
        $payAmount = $request->input('PayAmount');
        $moneyGiven = $request->input('Money');

        // Use the latestPaymentForLoan method to get the latest payment for the specific loan
        $latestPayment = $latestLoan->latestPaymentForLoan($latestLoan->lid);

        // Calculate the remaining balance using the retrieved latest payment
        $Remaining_Balance = $latestPayment->Remaining_Balance - $payAmount;

        // Validate that the payment amount is not greater than the remaining balance
        if ($payAmount > $moneyGiven) {
            return redirect()->back()->with('error', 'Given Money amount cannot be greater than the Pay Amount.');
        }
        $tolerance = 0.01;
        if ($payAmount > $latestPayment->Remaining_Balance) {
            return redirect()->back()->with('error', 'Remaining Balance cannot be greater than the Pay Amount.');
        }

        $changeAmount = $moneyGiven - $payAmount;

        // Update the remaining balance in the payment record
        $latestPayment->Remaining_Balance = $Remaining_Balance;
        $latestPayment->save();

        // Get the specific loan associated with the borrower
        $loanInfo = $latestLoan;

        if ($Remaining_Balance <= 0) {
            // Get the associated borrower information
            $borrowerInfo = $loanInfo->borrowerinfo;

            if ($borrowerInfo) {
                // Set the loan status to 'PAID'
                $borrowerInfo->update(['loanstatus' => 'PAID']);

                // Send email notification for FULLY PAID status
                $sendMailData = [
                    'emailType' => 'PaymentReceipt',
                    'BorrowerName' => $borrowerInfo->borFname,
                    'accountnumber' => $borrowerInfo->borAccount,
                    'loanNumber' => $loanInfo->loanNumber,
                    'loanAmount' => $loanInfo->LoanAmount,
                    'loanStatus' => 'PAID',
                    'paymentAmount' => $payAmount,
                    'paymentDate' => now(),
                    'remainingBalance' => $Remaining_Balance,
                ];

                // FacadesMail::to($borrowerInfo->borEmail)->send(new MailDemo($sendMailData));
            }
        } else {
            // Send email notification for PARTIAL PAYMENT
            $sendMailData = [
                'emailType' => 'PaymentReceipt',
                'BorrowerName' => $borrowerinfo->borFname,
                'accountnumber' => $borrowerinfo->borAccount,
                'loanNumber' => $latestLoan->loanNumber,
                'paymentAmount' => $payAmount,
                'remainingBalance' => $Remaining_Balance,
                'paymentDate' => now(),
                'loanStatus' => '',
            ];

            // FacadesMail::to($borrowerinfo->borEmail)->send(new MailDemo($sendMailData));
        }

        // Save the transaction record
        $Transaction = new Transaction_History();
        $PayDate = $request->PaymentDate;
        $formattedDate = Carbon::createFromFormat('M d, Y', $PayDate)->format('Y-m-d');
        $Transaction->PaymentDate = $formattedDate;
        $Transaction->PaymentAmount = $payAmount;
        $Transaction->RemainingBalance = $Remaining_Balance;
        $Transaction->ReferenceNumber = Helper::generateUniqueReference();
        $Transaction->borrower_id = $borrowerinfo->bno;

        if (!$Transaction->save()) {
            return redirect()->back()->with('error', 'Failed to record the transaction.');
        }
        $user = auth()->user();
        $logMessage = "Payment of {$payAmount} made by {$user->name} for Borrower {$borrowerinfo->borFname}";

        activity()
            ->performedOn($loanInfo)
            ->causedBy($user)
            ->log($logMessage);

        return redirect()->back()->with('paySuccess', 'Change: ' . $changeAmount);
    }

    // If the form is not submitted, continue with your existing code to display the payment information
    $test = 'test2';
    $borrowerinfo = BorrowerInfo::with('loans')->where('bno', $bno)->first();

    return view('Loan.payment', compact('borrowerinfo', 'test'));
}




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, borrowerinfo $user)
    {

        $request->validate([
            'xLoanAmount' => ['required', 'numeric', 'min:0.01', 'regex:/^\d+(\.\d{1,2})?$/'],
            'xcFullname' => 'required',
            'xcContact' => [
                'required',
                'string',
                'regex:/^[0-9]{11}$/',
                'starts_with:09',
                Rule::unique('borrowerinfo', 'borContact'),
                Rule::unique('loanInfo', 'cmContact'),
                Rule::unique('officerInfo', 'offContact'),
            ],
            
            'xcEmail' => [
                Rule::unique('borrowerinfo', 'borEmail'),
                Rule::unique('loanInfo', 'cmEmail'),
                Rule::unique('users', 'email'),
            ],
            'xcAddress' => 'required',
            
        ]);

        


        $accountnumber = $request->xsearch;
    $borrowerInfo = BorrowerInfo::where('borAccount', $accountnumber)->first();

    if (!$borrowerInfo) {
        return redirect()->route('Loan')->with('CreateError', 'Borrower information not found');
    }

    // Create a new loan entry
    $loanInfo = new loanInfo();
    $genId = Helper::LoanNumberGenerator(new loanInfo, 'loanNumber', 5, 'LNO');
    $loanInfo->loanNumber = $genId;
    $loanInfo->bno = $borrowerInfo->bno;
    $loanInfo->LoanAmount = $request->xLoanAmount;
    $loanInfo->InterestRate = $request->xInterest;
    $loanInfo->LoanApplication = $request->xLoanDate;
    $loanInfo->cmName = $request->xcFullname;
    $loanInfo->cmContact = $request->xcContact;
    $loanInfo->cmEmail = $request->xcEmail;
    $loanInfo->cmAddress = $request->xcAddress;
    $loanInfo->created_by = auth()->user()->name;
    $loanInfo->save();

    // Update borrower status
    $borrowerInfo->update(['loanstatus' => 'Waiting For Approval']);


        $loanInfo->save();

        

        

        $email = $request->xemail;
        $sendMailData = [
            'BorrowerName' => $request->xName,
            'accountnumber' => $accountnumber,
            'loanNumber' => $genId,
            'loanAmount' => $request->xLoanAmount,
            'loanStatus' => 'In Process', // Set the appropriate status here
            'emailType' => 'LoanStatusUpdate',
        ];

        // FacadesMail::to($email)->send(new MailDemo($sendMailData));
        // dd($request->xName);


        activity()
        ->performedOn($loanInfo)
        ->causedBy(auth()->user())
        ->withProperties([
            'loanNumber' => $genId,
            'LoanAmount' => $request->xLoanAmount,
            'InterestRate' => $request->xInterest,
            'LoanApplicationDate' => $request->xLoanDate,
            'BorrowerName' => $request->xcFullname,
            'BorrowerContact' => $request->xcContact,
            'BorrowerEmail' => $request->xcEmail,
            'BorrowerAddress' => $request->xcAddress,
            'CreatedBy' => auth()->user()->name,
            // Add more properties as needed...
        ])
        ->log('Loan created by ' . auth()->user()->name);

        return redirect()->route('Loan')->with('CreateSuccess', 'New Loan Created');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $loanInfo = loanInfo::findOrFail($id);     
            if ($loanInfo->payments()->exists()) {
                return redirect()->back()->with('error', 'Cannot delete Loan. The Loan is currently Active');
            }
           
            $loan = LoanInfo::findOrFail($id);    
        
        if ($loan->borrowerInfo) {
            $loan->borrowerInfo->update([
                'loanstatus' => 'Not Registered',
            ]); 
            $loanInfo->delete();
            // Log the deletion activity
            activity()
                ->performedOn($loanInfo)
                ->causedBy( auth()->user())
                ->withProperties([
                    'loanNumber' => $loanInfo->loanNumber,
                    'BorrowerName' => $loan->borrowerInfo->borFname,
                ])
                ->log('Loan deleted by ' . auth()->user()->name);
        } 


            return redirect()->back()->with('delete', 'Loan Successfully Deleted');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Loan not found');
        }
    }


    public function getBorrowerInfo()
    {
        $borrowerinfo = borrowerinfo::all();
        return view('Loan.create', compact('borrowerinfo'));
    }



}

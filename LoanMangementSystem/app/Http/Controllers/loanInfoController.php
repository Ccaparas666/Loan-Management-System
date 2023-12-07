<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\loanInfo;
use App\Models\borrowerinfo;
use App\Models\paymentInfo;

use App\Helpers\Helper;
use Psy\Readline\Hoa\Console;
use Carbon\Carbon; 
use Mail;
use App\Mail\MailDemo;
use Illuminate\Support\Facades\Mail as FacadesMail;

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


    public function search(Request $request, string $id)
    { 
        
        
        $search = $request->search;

        if ($search == '') {
            return redirect()->route('Loan')->with('error', 'Account Number Does Not Exist');
        }else{
            $borrowerinfo = borrowerinfo::where('borAccount', 'like', $search)->first();     
        }
        
        if (!$borrowerinfo) {
            return redirect()->route('Loan')->with('error', 'Account Number Does Not Exist');
        }  
        $genId = Helper::LoanNumberGenerator(new loanInfo, 'loanNumber', 5, 'LNO');
        if ($borrowerinfo->loans()->exists()) {
            return redirect()->route('Loan')->with('errorFound', 'Borrower already registered for a loan');
        }
        
        $loanInfo = loanInfo::join('borrowerinfo', 'loanInfo.bno', '=', 'borrowerinfo.bno')->get();
        return redirect()->route('Loan', compact('loanInfo', 'search', 'genId', 'borrowerinfo'))->with('success', 'Borrower Match Found');    
    }

    


    public function newloan()
    {
        
        $loanInfo = loanInfo:: join('borrowerinfo', 'loanInfo.bno', '=', 'borrowerinfo.bno')->get();
        

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
        $loanInfo = loanInfo::where('lid', $id)
            ->update([
                'loanstatus' => 'Approved',
                'approved_by' => $approvedBy,
            ]);
        ///////////////
            
///////////////////////////

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
            ];
            
            $payment = new paymentInfo();
            $payment->loan_id = $loan->lid; 
            $payment->remaining_balance = $loan->LoanAmount; 
            $payment->due_date = Carbon::now()->addMonth(); 
            $payment->save();
            
            // FacadesMail::to($loan->borrowerinfo->borEmail)->send(new MailDemo($sendMailData));
        } else {
         
            return back()->with('error', 'Loan or borrower information not found');
        }
        return back()->with('success', 'Approved Loan');

    }
    public function  StatusReject(Request $request, string $id)
    {   
        $RejectedBy = auth()->user()->name; 
        $loanInfo = loanInfo::where('lid', $id)
        ->update(
            [
                'loanstatus' => 'Rejected',
                'rejected_by' => $RejectedBy,
            ]
        );
       
        $loan = loanInfo::with('borrowerinfo')->where('lid', $id)->first();
        if ($loan && $loan->borrowerinfo) {   
            $sendMailData = [
                'BorrowerName' => $loan->borrowerinfo->borFname,
                'accountnumber' => $loan->borrowerinfo->borAccount,
                'loanNumber' => $loan->loanNumber,
                'loanAmount' => $loan->LoanAmount,
                'loanStatus' => 'Rejected',
            ];
            
            // FacadesMail::to($loan->borrowerinfo->borEmail)->send(new MailDemo($sendMailData));
        } else {
         
            return back()->with('error', 'Loan or borrower information not found');
        }
        return back()->with('reject', 'Rejected Loan' );
        
      
    }
   

    public function rejected()
    {
        
        $loanInfo = loanInfo:: join('borrowerinfo', 'loanInfo.bno', '=', 'borrowerinfo.bno')->get();

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
        $loanInfo = loanInfo:: join('borrowerinfo', 'loanInfo.bno', '=', 'borrowerinfo.bno')->get();

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

    public function  Released(Request $request, string $id)
    {
        $loanInfo = loanInfo::where('lid', $id)
        ->update(
            [
                'loanstatus' => 'Loan Active',
            ]
        );

       
        
        return back()->with('Released', 'Loan Released' );
    }

   

    public function paid()
    {
        
        $loanInfo = loanInfo::join('borrowerinfo', 'loanInfo.bno', '=', 'borrowerinfo.bno')
        ->orderBy('loanInfo.loanstatus')
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

    public function payment(){
        $test = 'test';

        
        return view('Loan.payment', compact('test'));
    }

    public function RoutePayment(Request $request, $bno){
        if ($request->isMethod('post')) {
            // Validate the form input
            $request->validate([
                'PayAmount' => 'required|numeric|min:0.01',
                'Money' => 'required|numeric|min:0.01',
            ]);
    
            // Find the borrower information
            $borrowerinfo = BorrowerInfo::with('loans.payments')->where('bno', $bno)->first();
    
            // Get the latest loan and its payments
            $loan = $borrowerinfo->loans->first();
            $payments = $loan->payments;
    
            // Calculate the remaining balance
            $payAmount = $request->input('PayAmount');
            $moneyGiven = $request->input('Money');
            $Remaining_Balance = $payments->last()->Remaining_Balance - $payAmount;
    
            // Update the remaining balance in the payment record
            $latestPayment = $payments->last();
            $latestPayment->Remaining_Balance = $Remaining_Balance;
            $latestPayment->save();
    
            // Optionally, you might want to update other loan-related information here
            // For example, you could update the loan status based on the remaining balance
    
            // Redirect back to the payment view with a success message
            return redirect()->route('Loan', ['bno' => $bno])->with('success', 'Payment successful!');
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
    public function store(Request $request, borrowerinfo $user )
    {
        
    
    $loanInfo = new loanInfo();
   
    $genId = Helper::LoanNumberGenerator(new loanInfo, 'loanNumber', 5, 'LNO');
    $loanInfo->bno = $request->xbno;
    $loanInfo->loanNumber = $genId;

    $loanInfo->LoanAmount = $request->xLoanAmount;
    $loanInfo->InterestRate = $request->xInterest;
    $loanInfo->LoanApplication = $request->xLoanDate;
   
    $loanInfo->cmName = $request->xcFullname;
    $loanInfo->cmContact = $request->xcContact;
    $loanInfo->cmEmail = $request->xcEmail;
    $loanInfo->cmAddress = $request->xcAddress;

    $accountnumber = $request->xsearch;
    
    $loanInfo->save();
   
    $email = $request->xemail;
    $sendMailData = [
        'BorrowerName' => $request->xName,
        'accountnumber' => $accountnumber,
        'loanNumber' => $genId,
        'loanAmount' => $request->xLoanAmount,
        'loanStatus' => 'In Process', // Set the appropriate status here
    ];
    
        // FacadesMail::to($email)->send(new MailDemo($sendMailData));
        // dd($request->xName);
      
   
     
        
        return redirect()->route('Loan')->with('CreateSuccess', 'New Loan Created' );

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
    }

    public function updates(Request $request, string $id)
    {
        //
        $validatedData = $request->validate([

            'FirstName' => ['required', 'max:20'],
            // 'MiddleName' => ['size:1'],
            'LastName' => ['required', 'max:20'],
            'Suffix' => ['nullable', 'max:5'],
            'Contact' => ['required','string','size:11','starts_with:09', Rule::unique('borrowerinfo', 'borContact')->ignore($id, 'bno')],
            'Email' => [ Rule::unique('borrowerinfo', 'borEmail')->ignore($id, 'bno')],
            // 'Email' => ['ends_with:gmail.com','unique:borrowerinfo,borEmail'],
            'Address' => ['required'],
            'BirthDate' => ['date',],
            'Gender' => ['required']
        ]);
        $borrowerinfo = borrowerinfo::where('bno', $id)
            ->update(
                [
                    'borFname' => $request->FirstName,
                    'borMname' => $request->MiddleName,
                    'borLname' => $request->LastName,
                    'borSuffix' => $request->Suffix,
                    'borContact' => $request->Contact,
                    'borEmail' => $request->Email,
                    'borAddress' => $request->Address,
                    'borDob' => $request->BirthDate,
                    'borGender' => $request->Gender,
                ]
            );
        return redirect()->route('borrower')->with('success', 'Borrower Successfully Updated' );
    }
    
   

    public function getBorrowerInfo(){
        $borrowerinfo = borrowerinfo::all();
        return view('Loan.create', compact('borrowerinfo'));
    }


   
}

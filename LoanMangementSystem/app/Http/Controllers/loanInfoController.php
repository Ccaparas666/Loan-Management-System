<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\loanInfo;
use App\Models\borrowerinfo;
use App\Helpers\Helper;
use Psy\Readline\Hoa\Console;
use Carbon\Carbon; 
use Mail;
use App\Mail\MailDemo;
use Illuminate\Support\Facades\Mail as FacadesMail;

class loanInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
     $search = $request->search;
    $genId = Helper::LoanNumberGenerator(new loanInfo, 'loanNumber', 5, 'LNO');

    $loanInfo = loanInfo::join('borrowerinfo', 'loanInfo.bno', '=', 'borrowerinfo.bno')->get();

    $data = borrowerinfo::where('borAccount', 'Like', $search)->get();

    return view('Loan.index', compact('loanInfo', 'data', 'search', 'genId'));
    }


    public function search(Request $request, string $id)
    { 
        
        
        $search = $request->search;
        $borrowerinfo = borrowerinfo::where('borAccount', 'like', $search)->first();     
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
        return back()->with('reject', 'Rejected Loan' );
        
      
    }
   

    public function rejected()
    {
        $loanInfo = loanInfo:: join('borrowerinfo', 'loanInfo.bno', '=', 'borrowerinfo.bno')->get();
        return view('Loan.rejected', compact('loanInfo'));
    }

    public function approved()
    {
        $loanInfo = loanInfo:: join('borrowerinfo', 'loanInfo.bno', '=', 'borrowerinfo.bno')->get();
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
        $loanInfo = loanInfo:: join('borrowerinfo', 'loanInfo.bno', '=', 'borrowerinfo.bno')->get();
        return view('Loan.paid', compact('loanInfo'));
    }

    public function payment(){
        return view('Loan.payment');
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
    $loanInfo->LoanTerm = $request->xLoanTerm;
    $loanInfo->LoanAmount = $request->xLoanAmount;
    $loanInfo->InterestRate = $request->xInterest;
    $loanInfo->LoanApplication = $request->xLoanDate;
    // $loanInfo->loanstatus = $request->xaddress;
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

    public function getBorrowerInfo(){
        $borrowerinfo = borrowerinfo::all();
        return view('Loan.create', compact('borrowerinfo'));
    }


   
}

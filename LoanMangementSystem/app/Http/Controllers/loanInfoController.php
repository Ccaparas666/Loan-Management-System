<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\loanInfo;
use App\Models\borrowerinfo;
use App\Helpers\Helper;
use Psy\Readline\Hoa\Console;

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

        $loanInfo = loanInfo:: join('borrowerinfo', 'loanInfo.bno', '=', 'borrowerinfo.bno')->get();
        
        $data = borrowerinfo::where('borAccount', 'Like', $search)->get();
       

       
            return view('Loan.index', compact('loanInfo','data', 'search','genId'));
       

        

        

      
       

    }


    public function search(Request $request, string $id)
    { 
        
        
        $search = $request->search;

        // Find borrowerinfo based on borAccount
        $borrowerinfo = borrowerinfo::where('borAccount', 'like', $search)->first();     
        if (!$borrowerinfo) {
            return redirect()->route('Loan')->with('error', 'Account Number Does Not Exist');
        }  
        $genId = Helper::LoanNumberGenerator(new loanInfo, 'loanNumber', 5, 'LNO');
        if ($borrowerinfo->loanInfo()->exists()) {
            return redirect()->route('Loan')->with('errorFound', 'Borrower already registered for a loan');
        }
        
        $loanInfo = loanInfo::join('borrowerinfo', 'loanInfo.bno', '=', 'borrowerinfo.bno')->get();
        return redirect()->route('Loan', compact('loanInfo', 'search', 'genId', 'borrowerinfo'))->with('success', 'Borrower Match Found');    

           // $search = $request->search;

        // $search = $request->search;
        // $genId = Helper::LoanNumberGenerator(new loanInfo, 'loanNumber', 5, 'LNO');
        // $loanInfo = loanInfo:: join('borrowerinfo', 'loanInfo.bno', '=', 'borrowerinfo.bno')->get();
        // $data = borrowerinfo::where('borAccount', 'Like', $search)->get();

        // $borrowerinfo = borrowerinfo::where('bno', $id)->first();
        
        // if($data->isEmpty()) {
        //     return redirect()->route('Loan')->with('error', 'Account Number Does Not Exist' );
        // }
        // elseif (loanInfo::where('bno', $borrowerinfo->bno)->exists()) {
        //     return redirect()->route('Loan')->with('error', 'Borrower already registered for a loan');
        // }
        // // elseif (loanInfo::where('bno', $borrowerinfo)->exists()) {

        // //     return redirect()->route('Loan')->with('error', 'Account Already Exist' );
        // // }
        // else{
        //     return redirect()->route('Loan', compact('loanInfo','data','search','genId','borrowerinfo'))->with('success', 'Borrower Match Found' );
        //     // dd($borrowerinfo);
        // }     
    }

    


    public function newloan()
    {
        
        $loanInfo = loanInfo:: join('borrowerinfo', 'loanInfo.bno', '=', 'borrowerinfo.bno')->get();
        return view('Loan.newloan', compact('loanInfo'));
    }
    public function StatusApprove(Request $request, string $id)
    {
        $loanInfo = loanInfo::where('lid', $id)
            ->update([
                'loanstatus' => 'Approved',
            ]);
        $loan = loanInfo::with('borrowerinfo')->where('lid', $id)->first();
        if ($loan && $loan->borrowerinfo) {   
            $sendMailData = [
                'BorrowerName' => $loan->borrowerinfo->borFname,
                'accountnumber' => $loan->borrowerinfo->borAccount,
                'loanNumber' => $loan->loanNumber,
                'loanAmount' => $loan->LoanAmount,
                'loanStatus' => 'Approved',
            ];
            
            FacadesMail::to($loan->borrowerinfo->borEmail)->send(new MailDemo($sendMailData));
        } else {
         
            return back()->with('error', 'Loan or borrower information not found');
        }
        return back()->with('success', 'Approved Loan');

    }

    public function  StatusReject(Request $request, string $id)
    {   
        $loanInfo = loanInfo::where('lid', $id)
        ->update(
            [
                'loanstatus' => 'Rejected',
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
        
    //     $validatedData = $request->validate([
            
    //         'xfirstName' => ['required', 'max:20'],
    //         'xmiddleName' => ['max:15'],
    //         'xlastName' => ['required', 'max:20'],
    //        'xsuffix' => ['nullable','max:5'],
    //        'xcontact' => ['required', 'max:20'],
    //        'xemail' => ['required', 'max:100'],
    //         'xaddress' => ['required'],
    //         'xage' => ['required', ],
    //         'xgender' => ['required'],
            
    //    ]);

       

       

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
   

    // $sendMailData = [
    //     'title' => "Mail from walsjdhasd",
    //     'body' => 'this is an email from carmelo',
    //     'Fullname' => $request->xFullname,
    //     'accountnumber' => $accountnumber,
    //     'loanNumber' => $genId,
    //     'loanAmount' => $request->xLoanAmount,
    //     'BorrowerName' => $request->xName,
        

    // ];

    $sendMailData = [
        'BorrowerName' => $request->xName,
        'accountnumber' => $accountnumber,
        'loanNumber' => $genId,
        'loanAmount' => $request->xLoanAmount,
        'loanStatus' => 'In Process', // Set the appropriate status here
    ];
        FacadesMail::to($email)->send(new MailDemo($sendMailData));
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

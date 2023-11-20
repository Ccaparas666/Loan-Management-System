<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\loanInfo;
use App\Models\borrowerinfo;
use App\Helpers\Helper;
use Psy\Readline\Hoa\Console;

use Mail;
use App\Mail\MailDemo;
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
        
        
        // $search = $request->search;

        
        
        
        
    
        $borrowerinfo = borrowerinfo::where('bno', $id)->get();
      

       
        $search = $request->search;

      
        $genId = Helper::LoanNumberGenerator(new loanInfo, 'loanNumber', 5, 'LNO');

        $loanInfo = loanInfo:: join('borrowerinfo', 'loanInfo.bno', '=', 'borrowerinfo.bno')->get();

        $data = borrowerinfo::where('borAccount', 'Like', $search)->get();

    

        return view('Loan.index', compact('loanInfo','data','search','genId','borrowerinfo'))->with('found', ' ' );
       
        
        
        

       


      

        

        
    }

    


    public function newloan()
    {
        
        $loanInfo = loanInfo:: join('borrowerinfo', 'loanInfo.bno', '=', 'borrowerinfo.bno')->get();
        return view('Loan.newloan', compact('loanInfo'));
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

    public function paid()
    {
        $loanInfo = loanInfo:: join('borrowerinfo', 'loanInfo.bno', '=', 'borrowerinfo.bno')->get();
        return view('Loan.paid', compact('loanInfo'));
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
    public function store(Request $request )
    {
        //
    //     $validatedData = $request->validate([
            
    //         'xfirstName' => ['required', 'max:20'],
    //         'xmiddleName' => ['max:15'],
    //         'xlastName' => ['required', 'max:20'],
    //        'xsuffix' => ['nullable','max:5'],
    //        'xcontact' => ['required', 'max:20'],
    //        'xemail' => ['required', 'max:100'],
    //         'xaddress' => ['required'],
    //         'xage' => ['required', ],
    //         'xgender' => ['required']
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


    $loanInfo->save();
        
    
    $sendMailData = [
        'title' => "Mail from walsjdhasd",
        'body' => 'this is an email from carmelo'
        

    ];
        Mail::to('carcapz123@gmail.com')->send(new MailDemo($sendMailData));
        dd('Email sent yawa!!');
   
    // return redirect()->route('Loan')->with('success', ' ' );

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

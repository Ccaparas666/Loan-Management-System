<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\loanInfo;
use App\Models\borrowerinfo;

class loanInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $borrowerinfo = borrowerinfo::all();
        $loanInfo = loanInfo:: join('borrowerinfo', 'loanInfo.bno', '=', 'borrowerinfo.bno')->get();
        
        $data = borrowerinfo::where('bno', 'Like', '%'.$search.'%')->get();
        return view('Loan.index', compact('loanInfo','borrowerinfo','data'));
        search();

    }


    public function search(Request $request)
    {
        $search = $request->search;
        $borrowerinfo = borrowerinfo::all();
        $loanInfo = loanInfo:: join('borrowerinfo', 'loanInfo.bno', '=', 'borrowerinfo.bno')->get();

        $data = borrowerinfo::where('bno', 'Like', '%'.$search.'%')->get();
        return view('Loan.index', compact('loanInfo','borrowerinfo','data'));
        preventDefault();

        

        
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
    public function store(Request $request)
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

       

       $loanInfo->save();
       return redirect()->route('Loan');
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

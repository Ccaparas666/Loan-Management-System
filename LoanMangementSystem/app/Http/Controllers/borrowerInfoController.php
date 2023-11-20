<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\borrowerinfo;
use App\Helpers\Helper;
use App\Models\officerInfo;
class borrowerInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $borrowerinfo = borrowerinfo::all();
        return view('borrower.index', compact('borrowerinfo'));    
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
        $validatedData = $request->validate([

            'xfirstName' => ['required', 'max:20'],
            'xmiddleName' => ['max:15'],
            'xlastName' => ['required', 'max:20'],
            'xsuffix' => ['nullable', 'max:5'],
            'xcontact' => ['required', 'max:20'],
            'xemail' => ['required', 'max:100'],
            'xaddress' => ['required'],
            'xbirthDate' => ['required',],
            'xgender' => ['required']
        ]);
        $genAccount = Helper::AccountNumberGenerator(new borrowerinfo, 'borAccount', 5, 'BAC');
        $borrowerinfo = new borrowerinfo();
        $borrowerinfo->borAccount = $genAccount;
        $borrowerinfo->borFname = $request->xfirstName;
        $borrowerinfo->borMname = $request->xmiddleName;
        $borrowerinfo->borLname = $request->xlastName;
        $borrowerinfo->borSuffix = $request->xsuffix;
        $borrowerinfo->borContact = $request->xcontact;
        $borrowerinfo->borEmail = $request->xemail;
        $borrowerinfo->borAddress = $request->xaddress;
        $borrowerinfo->borDob = $request->xbirthDate;
        $borrowerinfo->borGender = $request->xgender;

        $borrowerinfo->save();
        return redirect()->route('borrower')->with('success', 'Borrower Successfully Created' );
    }

    // Search function    -------- NOT DONE


    // Search function    -------- NOT DONE

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
        $borrowerinfo = borrowerinfo::where('bno', $id)->get();
        return view('borrower.edit', compact('borrowerinfo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $borrowerinfo = borrowerinfo::where('bno', $id)
            ->update(
                [
                    'borFname' => $request->xfirstName,
                    'borMname' => $request->xmiddleName,
                    'borLname' => $request->xlastName,
                    'borSuffix' => $request->xsuffix,
                    'borContact' => $request->xcontact,
                    'borEmail' => $request->xemail,
                    'borAddress' => $request->xaddress,
                    'borDob' => $request->xbirthDate,
                    'borGender' => $request->xgender,
                ]
            );
        return redirect()->route('borrower')->with('success', 'Borrower Successfully Updated' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    
    {
        $borrowerinfo = borrowerinfo::where('bno', $id);
        $borrowerinfo2 = officerInfo::where('ono', $id);
        $borrowerinfo2->delete();
        $borrowerinfo->delete();
        return redirect()->route('borrower')->with('success', 'Borrower Successfully Deleted' );
    }
}

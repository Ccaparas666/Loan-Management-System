<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\borrowerinfo;
use App\Models\paymentInfo;
use App\Helpers\Helper;
use App\Models\officerInfo;
use Illuminate\Validation\Rule;
use Illuminate\Database\QueryException; 
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

            'FirstName' => ['required', 'max:20'],
            // 'MiddleName' => ['size:1'],
            'LastName' => ['required', 'max:20'],
            'Suffix' => ['nullable', 'max:5'],
            'Contact' => ['required','string','size:11','starts_with:09', 'unique:borrowerinfo,borContact'],
            'Email' => ['unique:borrowerinfo,borEmail'],
            // 'Email' => ['ends_with:gmail.com','unique:borrowerinfo,borEmail'],
            'Address' => ['required'],
            'BirthDate' => ['date',],
            'Gender' => ['required']
        ]);
        $genAccount = Helper::AccountNumberGenerator(new borrowerinfo, 'borAccount', 5, 'BAC');
        $borrowerinfo = new borrowerinfo();
        $borrowerinfo->borAccount = $genAccount;
        $borrowerinfo->borFname = $request->FirstName;
        $borrowerinfo->borMname = $request->MiddleName;
        $borrowerinfo->borLname = $request->LastName;
        $borrowerinfo->borSuffix = $request->Suffix;
        $borrowerinfo->borContact = $request->Contact;
        $borrowerinfo->borEmail = $request->Email;
        $borrowerinfo->borAddress = $request->Address;
        $borrowerinfo->borDob = $request->BirthDate;
        $borrowerinfo->borGender = $request->Gender;

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
    $borrowerinfo = BorrowerInfo::with('loans.payments')->where('bno', $id)->get();

    $loanStatus = optional($borrowerinfo->first()->loans->first())->loanstatus;

    return view('borrower.view', compact('borrowerinfo', 'loanStatus'));
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    
    {
        // $borrowerinfo = borrowerinfo::where('bno', $id);
        // $borrowerinfo->delete();
        // return redirect()->route('borrower')->with('success', 'Borrower Successfully Deleted' );
        try {
            $borrowerinfo = BorrowerInfo::findOrFail($id);     
            if ($borrowerinfo->loans()->exists()) {
                return redirect()->route('borrower')->with('error', 'Cannot delete borrower. There are active loans associated with this borrower.');
            }
            $borrowerinfo->delete();
            return redirect()->route('borrower')->with('success', 'Borrower Successfully Deleted');
        } catch (QueryException $e) {
            return redirect()->route('borrower')->with('error', 'Borrower not found');
        }
    }
}

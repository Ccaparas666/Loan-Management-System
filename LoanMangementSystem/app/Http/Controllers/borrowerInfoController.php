<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\borrowerinfo;
use App\Models\paymentInfo;
use App\Models\loanInfo;
use App\Helpers\Helper;
use App\Models\officerInfo;
use App\Models\Transaction_History;
use Illuminate\Validation\Rule;
use Illuminate\Database\QueryException; 
use Spatie\Activitylog\Traits\LogsActivity;
class borrowerInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $borrowerinfo = BorrowerInfo::all();
           
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
    // public function store(Request $request)
    // {
    //     //
    //     $validatedData = $request->validate([

    //         'FirstName' => ['required', 'max:20'],
    //         'MiddleName' => ['nullable', 'string', 'max:1', 'regex:/^[a-zA-Z]+$/'],
    //         'LastName' => ['required', 'max:20'],
    //         'Suffix' => ['nullable', 'max:5'],
    //         'Contact' => ['required','string','regex:/^[0-9]{11}$/','starts_with:09', 'unique:borrowerinfo,borContact'],
    //         'Email' => ['unique:borrowerinfo,borEmail'],
    //         // 'Email' => ['ends_with:gmail.com','unique:borrowerinfo,borEmail'],
    //         'Address' => ['required'],
    //         'BirthDate' => ['date',],
    //         'Gender' => ['required']
    //     ]);
    //     $genAccount = Helper::AccountNumberGenerator(new borrowerinfo, 'borAccount', 5, 'BAC');
    //     $borrowerinfo = new borrowerinfo();
    //     $borrowerinfo->borAccount = $genAccount;
    //     $borrowerinfo->borFname = $request->FirstName;
    //     $borrowerinfo->borMname = $request->MiddleName;
    //     $borrowerinfo->borLname = $request->LastName;
    //     $borrowerinfo->borSuffix = $request->Suffix;
    //     $borrowerinfo->borContact = $request->Contact;
    //     $borrowerinfo->borEmail = $request->Email;
    //     $borrowerinfo->borAddress = $request->Address;
    //     $borrowerinfo->borDob = $request->BirthDate;
    //     $borrowerinfo->borGender = $request->Gender;
        

    //     $borrowerinfo->save();
    //     return redirect()->route('borrower')->with('success', 'Borrower Successfully Created' );
    // }


    public function store(Request $request)
{
    $validatedData = $request->validate([
        'FirstName' => ['required', 'max:20'],
        'MiddleName' => ['nullable', 'string', 'max:1', 'regex:/^[a-zA-Z]+$/'],
        'LastName' => ['required', 'max:20'],
        'Suffix' => ['nullable', 'max:5'],
        'Contact' => ['required', 'string', 'regex:/^[0-9]{11}$/','starts_with:09', 'unique:borrowerinfo,borContact'],
        'Email' => ['unique:borrowerinfo,borEmail'],
        'Address' => ['required'],
        'BirthDate' => ['date'],
        'Gender' => ['required'],
        'borPicture' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $genAccount = Helper::AccountNumberGenerator(new borrowerinfo, 'borAccount', 5, 'BAC');
    
    $borrowerinfo = new borrowerinfo([
        'borAccount' => $genAccount,
        'borFname' => $request->FirstName,
        'borMname' => $request->MiddleName,
        'borLname' => $request->LastName,
        'borSuffix' => $request->Suffix,
        'borContact' => $request->Contact,
        'borEmail' => $request->Email,
        'borAddress' => $request->Address,
        'borDob' => $request->BirthDate,
        'borGender' => $request->Gender,
    ]);

    $user = auth()->user();

if ($user && $user->is_admin) {
    // The authenticated user is an admin
    activity()
        ->performedOn($borrowerinfo)
        ->causedBy($user)
        ->log("Borrower created by " . $user->name);
} else {
    activity()
        ->performedOn($borrowerinfo)
        ->causedBy($user)
        ->log("Borrower created by " . $user->name);
}

        
    // Save the borrowerinfo instance to the database
    $borrowerinfo->save();

    // Check if an image is present and update the 'borPicture' field
    if ($request->hasFile('borPicture')) {
        $image = $request->file('borPicture');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads'), $imageName);

        // Update the 'borPicture' field in the database
        $borrowerinfo->update(['borPicture' => 'uploads/' . $imageName]);
    }

    
    return redirect()->route('borrower')->with('success', 'Borrower Successfully Created');
}


    // Search function    -------- NOT DONE


    // Search function    -------- NOT DONE

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
{
    $borrowerinfo = BorrowerInfo::with(['loans.payments' => function ($query) {
        $query->orderBy('due_date', 'desc'); 
    }])->where('bno', $id)->get();
 
    $Loan = BorrowerInfo::with('loans')->where('bno', $id)->first();
    $loanStatus = optional($borrowerinfo->first())->loanstatus;

    
    $transactionHistory = Transaction_History::where('borrower_id', $id)->get();
    $latestDueDate = null;

// Check if borrower information is available
if ($borrowerinfo->isNotEmpty()) {
    $firstLoan = $borrowerinfo->first()->loans->first();

    // Check if loans are available
    if ($firstLoan) {
        $firstPayment = $firstLoan->payments->first();

        // Check if payments are available
        if ($firstPayment) {
            $latestDueDate = $firstPayment->due_date;
        }
    }
}

    return view('borrower.view', compact('borrowerinfo', 'loanStatus', 'Loan', 'latestDueDate','transactionHistory'));
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
            'MiddleName' => ['nullable', 'string', 'max:1', 'regex:/^[a-zA-Z]+$/'],
            'LastName' => ['required', 'max:20'],
            'Suffix' => ['nullable', 'max:5'],
            'Contact' => ['required','string','starts_with:09','regex:/^[0-9]{11}$/', Rule::unique('borrowerinfo', 'borContact')->ignore($id, 'bno')],
            'Email' => [ Rule::unique('borrowerinfo', 'borEmail')->ignore($id, 'bno')],
            // 'Email' => ['ends_with:gmail.com','unique:borrowerinfo,borEmail'],
            'Address' => ['required'],
            'BirthDate' => ['date',],
            'Gender' => ['required'],
            'borPicture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $borrowerinfo = borrowerinfo::findOrFail($id);

        $borrowerinfo->fill([
            'borFname' => $request->FirstName,
            'borMname' => $request->MiddleName,
            'borLname' => $request->LastName,
            'borSuffix' => $request->Suffix,
            'borContact' => $request->Contact,
            'borEmail' => $request->Email,
            'borAddress' => $request->Address,
            'borDob' => $request->BirthDate,
            'borGender' => $request->Gender,
            
        ]);

        // if ($request->hasFile('borPicture')) {
        //     // Process and save the new profile picture
        //     $image = $request->file('borPicture');
        //     $imageName = time() . '.' . $image->getClientOriginalExtension();
        //     $image->move(public_path('uploads'), $imageName);
    
        //     // Remove the old profile picture file
        //     if (file_exists(public_path($borrowerinfo->borPicture))) {
        //         unlink(public_path($borrowerinfo->borPicture));
        //     }
    
        //     $borrowerinfo->borPicture = 'uploads/' . $imageName;
        // }


        if ($request->hasFile('borPicture')) {
            // Process and save the new profile picture
            $image = $request->file('borPicture');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
        
            // Remove the old profile picture file
            $oldFilePath = public_path($borrowerinfo->borPicture);
        
            if (file_exists($oldFilePath)) {
                try {
                    unlink($oldFilePath);
                } catch (\Exception $e) {
                    // Log or handle the exception as needed
                    \Log::error("Error deleting file: " . $e->getMessage());
                }
            }
        
            $borrowerinfo->borPicture = 'uploads/' . $imageName;
        }
        
    
       

        $borrowerinfo->save();
        $user = auth()->user();
        $logMessage = "Borrower updated by {$user->name}";
        
        activity()
            ->performedOn($borrowerinfo)
            ->causedBy($user)
            ->log($logMessage);
        return redirect()->route('borrower')->with('success', 'Borrower Successfully Updated' );
    }
    

    // public function borrowerpay(Request $request){
    //     $remainingbalance = $request->Balance;
    //     $PayAmount= $request->PayAmount;
    //     $Money = $request->Money;


    //     $change =     $Money -  $PayAmount;
    //     $balance = $remainingbalance - $PayAmount;

    //     dd($change );
    //     $dueLoans = LoanInfo::join('paymentInfo', 'loanInfo.lid', '=', 'paymentInfo.loan_id')
    //          ->where('paymentInfo.due_date', '<', now())
    //          ->select('loanInfo.*', 'paymentInfo.Remaining_Balance')
    //          ->distinct()
    //          ->get();


    // }








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

            $user = auth()->user();
        $logMessage = "Borrower deleted by {$user->name}";
        
        activity()
            ->performedOn($borrowerinfo)
            ->causedBy($user)
            ->log($logMessage);

        // Delete the borrowerinfo
        $borrowerinfo->delete();
            return redirect()->route('borrower')->with('success', 'Borrower Successfully Deleted');
        } catch (QueryException $e) {
            return redirect()->route('borrower')->with('error', 'Borrower not found');
        }

        
    }
}

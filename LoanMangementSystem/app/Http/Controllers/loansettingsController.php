<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\loansettings;
use Illuminate\Support\Facades\Validator;
class loansettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function Interest(Request $request)
{
    $validator = Validator::make($request->all(), [
        'xinterest' => 'required|integer',
    ]);

    if ($validator->fails()) {
        
        return back()->with('inputerror', 'Interest Input invalid. It must be a whole number WITHOUT decimals or special characters (e.g., 12% or 2.1).');
    }

    $existingInterest = loansettings::where('interest', $request->xinterest)->exists();

    if ($existingInterest) {
        // Interest value already exists
        return back()->with('exist', 'Interest value already exists in the database.');
    }

   
    $loansettings = new loansettings();
    $loansettings->interest = $request->xinterest;
    $loansettings->save();
    activity()
    ->causedBy(auth()->user())
    ->performedOn($loansettings)
    ->log('Added New Interest Rate by ' . auth()->user()->name);

    return back()->with('success', ' New Interest Rate Added');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function interestdisplay(){
        $loansettings = loansettings::all();
           
        return view('Loan.interest', compact('loansettings'));    
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'xinterest' => 'required|integer',
        ]);
    
        if ($validator->fails()) {
            
            return back()->with('inputerror', 'Interest Input invalid. It must be a whole number WITHOUT decimals or special characters (e.g., 12% or 2.1).');
        }
    
        $existingInterest = loansettings::where('interest', $request->xinterest)->exists();
    
        if ($existingInterest) {
            // Interest value already exists
            return back()->with('exist', 'Interest value already exists in the database.');
        }
    
       
        $loanSettings = loansettings::where('lsid', $id)
            ->update(
                [
                    'interest' => $request->xinterest,
                ]
            );
            $loanSettings = loansettings::findOrFail($id);

    // Log the update activity
    activity()
        ->causedBy(auth()->user())
        ->performedOn($loanSettings)
        ->log('Updated Interest Rate by ' . auth()->user()->name);

    
        return back()->with('success', ' Interest Rate Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $loanSettings = loansettings::find($id); 
        if (!$loanSettings) {
            return redirect()->route('Loan.interest')->with('error', 'Interest Rate not found');
        }
    
        $loanSettings->delete();
        activity()
        ->causedBy(auth()->user())
        ->performedOn($loanSettings)
        ->log('Deleted Interest Rate by '. auth()->user()->name);

    $loanSettings->delete();
        return back()->with('success', 'Interest Rate Deleted');
    }
}

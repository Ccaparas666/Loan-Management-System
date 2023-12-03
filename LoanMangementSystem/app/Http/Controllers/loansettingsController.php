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
}

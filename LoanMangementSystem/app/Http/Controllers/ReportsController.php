<?php

namespace App\Http\Controllers;

use App\Models\LoanInfo;
use Barryvdh\DomPDF\Facade;


use Illuminate\Http\Request;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function generateLoanReport(Request $request)
    {
        // Add any filtering logic based on your requirements
        $loans = LoanInfo::with('borrowerinfo')->get();

        // Load the view and pass the loans data to it
      
$pdf = Pdf::loadView('activity.loan', ['loans' => $loans]);


        // Optional: Set the paper size and orientation
        $pdf->setPaper('A4', 'landscape');

        // Return the PDF as a download
        return $pdf->download('loan_report.pdf');
    }
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

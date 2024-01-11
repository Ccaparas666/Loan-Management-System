<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\loanInfo;
use App\Models\User;
use App\Models\BorrowerInfo;

use App\Models\PaymentInfo;
use PDF;

class PDFController extends Controller
{
    //
    public function generatePDF()
    {
        $borrowers = BorrowerInfo::with(['loans', 'loans.payments'])->get();

        $data = [
            'title' => 'Summary Report',
            'date' => now(),
            'borrowers' => $borrowers,
        ];

        $pdf = PDF::loadView('Reports.myPDF', $data);

        return $pdf->stream('summary_report.pdf');
    }

    public function generateReport()
{
    // Retrieve data for the report
     $borrowers = BorrowerInfo::with('loans.payments')->get();


    $data = [
        'title' => 'Borrower Report',
        'date' => now(),
        'borrowers' => $borrowers,
    ];

    

    $pdf = PDF::loadView('Reports.report', $data);
    return $pdf->stream('loan_report.pdf');
}

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\loanInfo;
use App\Models\User;
use App\Models\BorrowerInfo;

use App\Models\PaymentInfo;
use Carbon\Carbon;
use PDF;

class PDFController extends Controller
{
    //FindDate

    public function FindDate(Request $request)
    {
      
       $startDate = $request->start;
    $endDate = $request->end;
    return view('generate-report', compact('startDate', 'endDate'));
    //    dd($startDate, $endDate);

      
    }
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


    public function generateReport(Request $request)
{
    // $startDate = $request->input('start');
    // $endDate = $request->input('end');

    
// dd($startDate);
    // $borrowers = BorrowerInfo::with(['loans', 'loans.payments'])->get();

    $startDate = Carbon::createFromFormat('m/d/Y', $request->input('start'))->format('Y-m-d');
$endDate = Carbon::createFromFormat('m/d/Y', $request->input('end'))->format('Y-m-d');

$borrowers = BorrowerInfo::with(['loans', 'loans.payments', 'transactionHistories'])
    ->whereHas('loans', function ($query) use ($startDate, $endDate) {
        $query->whereHas('payments', function ($subquery) use ($startDate, $endDate) {
            $subquery->whereBetween('LoanApplication', [$startDate, $endDate]);
        });
    })
    ->get();




    // dd ( $borrowers1);


    if ($borrowers->isEmpty()) {
        // dd('no data');
        dd($startDate, $endDate);
    }

//     dd ($borrowers);

// dd($startDate, $endDate);

    $totalRecords = 0;
    $totalLoanAmount = 0;
    $totalBalance = 0;
    $totalPayment = 0;
    $totalLoanApplied = 0;
    
    foreach ($borrowers as $borrower) {
        foreach ($borrower->loans as $loan) {
            $totalRecords++;
            $totalLoanAmount += $loan->LoanAmount;
            $totalBalance += $loan->Remaining_Balance;
            // Assuming you have a payment attribute in your loan model
            $totalPayment += $loan->payment;
            $totalLoanApplied++;
        }
    }
    

    $totalRecords = count($borrowers->flatMap->loans);

    $data = [
        'title' => 'Summary Report',
        'date' => now(),
        'borrowers' => $borrowers,
       
        'totalRecords' => $totalRecords,
        'totalLoanAmount' => $totalLoanAmount,
        'totalBalance' => $totalBalance,
        'totalPayment' => $totalPayment,
        'totalLoanApplied' => $totalLoanApplied,
    ];
    
    
    

    $pdf = PDF::loadView('Reports.report', $data);

    return $pdf->stream('summary_report.pdf');
}


public function generateReport1(Request $request)
{
    // Retrieve data for the report
    $startDate = $request->input('start');
    $endDate = $request->input('end');

    // Fetch borrowers with loans and payments within the specified date range
    // $borrowers = BorrowerInfo::with(['loans' => function ($query) use ($startDate, $endDate) {
    //     $query->whereBetween('cash_release_date', [$startDate, $endDate]); // Use 'cash_release_date' here
    // }, 'loans.payments'])
    //     ->whereHas('loans', function ($query) use ($startDate, $endDate) {
    //         $query->whereBetween('cash_release_date', [$startDate, $endDate]); // Use 'cash_release_date' here
    //     })
    //     ->get();

    $borrowers = BorrowerInfo::with(['loans', 'loans.payments', 'loans.transactionHistories'])
    ->whereHas('loans', function ($query) use ($startDate, $endDate) {
        $query->whereHas('payments', function ($subquery) use ($startDate, $endDate) {
            $subquery->whereBetween('LoanApplication', [$startDate, $endDate]);
        });
    })
    ->get();


    



    // You can customize the data further if needed

    // Pass the data to the PDF view
    $data = [
        'title' => 'Borrower Report',
        'date' => now(),
        'borrowers' => $borrowers,
    ];

    // Load the PDF view
    $pdf = PDF::loadView('Reports.report', $data);

    // Return the PDF to the browser or save it to a file
    return $pdf->stream('loan_report.pdf');
}

}

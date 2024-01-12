<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\loanInfo;
use App\Models\User;
use App\Models\BorrowerInfo;
use App\Helpers\Helper;

use App\Models\PaymentInfo;
use Carbon\CarbonPeriod;
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
    public function generateMonthRange($startDate, $endDate)
    {
        $period = CarbonPeriod::create($startDate, '1 month', $endDate);
    
        $months = [];
        foreach ($period as $date) {
            $months[] = $date->format('M Y');
        }
    
        return $months;
    }

    public function generateReport(Request $request)
{
    // $startDate = $request->input('start');
    // $endDate = $request->input('end');

    
// dd($startDate);
    // $borrowers = BorrowerInfo::with(['loans', 'loans.payments'])->get();

    $approvedPayments = loanInfo::where('loanstatus', 'Approved')->get();
    $pendingApprovalPayments = loanInfo::where('loanstatus', 'Waiting For Approval')->get();
    // Add similar queries for other statuses

    $approvedCount = $approvedPayments->count();
    $pendingApprovalCount = $pendingApprovalPayments->count();


    $startDate = Carbon::createFromFormat('m/d/Y', $request->input('start'))->format('Y-m-d');
$endDate = Carbon::createFromFormat('m/d/Y', $request->input('end'))->format('Y-m-d');

$dateRange =  $startDate . ' - ' . $endDate;

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

        return back()->with('error', 'Date Range Not Found');
        
    }

//     dd ($borrowers);

// dd($startDate, $endDate);

    $totalRecords = 0;
    $totalLoanAmount = 0;
    $totalBalance = 0;
    $totalPayment = 0;
    $totalLoanApplied = 0;
    $totalPaid = 0;
    
    foreach ($borrowers as $borrower) {
        foreach ($borrower->transactionHistories as $transactionHistory) {
            $totalPaid += $transactionHistory->PaymentAmount;
        }
        foreach ($borrower->loans as $loan) {
            $totalRecords++;
            $totalLoanAmount += $loan->LoanAmount;
            $totalBalance += $loan->Remaining_Balance;
            // Assuming you have a payment attribute in your loan model
            $totalPayment += $loan->payment;
             // Assuming you have a relationship with TransactionHistory
        
           
        
            $totalLoanApplied++;
        }
    }
    

    $totalRecords = count($borrowers->flatMap->loans);

   



    // $yearlyData = [];
    // foreach ($borrowers as $borrower) {
    //     foreach ($borrower->transactionHistories as $transactionHistory) {
    //         $year = Carbon::createFromFormat('Y-m-d H:i:s', $transactionHistory->PaymentDate)->format('Y');

    //         if (!isset($yearlyData[$year])) {
    //             $yearlyData[$year] = [
    //                 'totalPaid' => 0,
    //                 'totalRecords' => 0,
    //                 'totalLoanAmount' => 0,
    //                 'totalBalance' => 0,
    //                 'totalPayment' => 0,
    //                 'totalLoanApplied' => 0,
    //             ];
    //         }
    //         $yearlyData[$year]['totalPaid'] += $transactionHistory->PaymentAmount;
    //     }

    //     foreach ($borrower->loans as $loan) {
    //         $carbonDate = Carbon::createFromFormat('Y-m-d', $loan->LoanApplication);
    //         $year = $carbonDate->format('Y');
    //         if (!isset($yearlyData[$year])) {
    //             $yearlyData[$year] = [
    //                 'totalPaid' => 0,
    //                 'totalRecords' => 0,
    //                 'totalLoanAmount' => 0,
    //                 'totalBalance' => 0,
    //                 'totalPayment' => 0,
    //                 'totalLoanApplied' => 0,
    //             ];
    //         }
    //         $yearlyData[$year]['totalRecords']++;
    //         $yearlyData[$year]['totalLoanAmount'] += $loan->LoanAmount;
    //         $yearlyData[$year]['totalBalance'] += $loan->Remaining_Balance;
    //         $yearlyData[$year]['totalPayment'] += $loan->payment;
    //         $yearlyData[$year]['totalLoanApplied']++;
    //     }
    // }
  

    $monthlyData = [];

foreach ($borrowers as $borrower) {
    foreach ($borrower->transactionHistories as $transactionHistory) {
        $paymentDate = Carbon::createFromFormat('Y-m-d H:i:s', $transactionHistory->PaymentDate);

        // Check if payment date is within the specified range
        if ($paymentDate->between($startDate, $endDate)) {
            $monthYear = $paymentDate->format('M Y');

            if (!isset($monthlyData[$monthYear])) {
                $monthlyData[$monthYear] = [
                    'totalPaid' => 0,
                    'totalRecords' => 0,
                    'totalLoanAmount' => 0,
                    'totalBalance' => 0,
                    'totalPayment' => 0,
                    'totalLoanApplied' => 0,
                ];
            }
            $monthlyData[$monthYear]['totalPaid'] += $transactionHistory->PaymentAmount;
        }
    }

    foreach ($borrower->loans as $loan) {
        $loanApplicationDate = Carbon::createFromFormat('Y-m-d', $loan->LoanApplication);

        // Check if loan application date is within the specified range
        if ($loanApplicationDate->between($startDate, $endDate)) {
            $monthYear = $loanApplicationDate->format('M Y');

            if (!isset($monthlyData[$monthYear])) {
                $monthlyData[$monthYear] = [
                    'totalPaid' => 0,
                    'totalRecords' => 0,
                    'totalLoanAmount' => 0,
                    'totalBalance' => 0,
                    'totalPayment' => 0,
                    'totalLoanApplied' => 0,
                ];
            }
            $monthlyData[$monthYear]['totalRecords']++;
            $monthlyData[$monthYear]['totalLoanAmount'] += $loan->LoanAmount;
            $monthlyData[$monthYear]['totalBalance'] += $loan->Remaining_Balance;
            $monthlyData[$monthYear]['totalPayment'] += $loan->payment;
            $monthlyData[$monthYear]['totalLoanApplied']++;
        }
    }
}
    // Your existing code...
    $selectedMonths = Helper::generateMonthRange($startDate, $endDate);

    $data = [
        'title' => 'Summary Report',
        'date' => now(),
        'borrowers' => $borrowers,
        'totalPaid' => $totalPaid,
        'totalRecords' => $totalRecords,
        'totalLoanAmount' => $totalLoanAmount,
        'totalBalance' => $totalBalance,
        'totalPayment' => $totalPayment,
        'totalLoanApplied' => $totalLoanApplied,
        'approvedPayments' =>  $approvedPayments,
        'pendingApprovalPayments' => $pendingApprovalPayments,
        'approvedCount' => $approvedCount,
        'pendingApprovalCount' => $pendingApprovalCount,
        'dateRange' => $dateRange,
        'monthlyData' => $monthlyData,
        'selectedMonths' => $selectedMonths, 
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

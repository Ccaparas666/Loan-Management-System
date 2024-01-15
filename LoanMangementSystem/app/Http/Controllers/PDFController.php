<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\loanInfo;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\BorrowerInfo;
use App\Helpers\Helper;
use App\Models\Transaction_History;

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

    // public function generateReport(Request $request)
    // {
    //     $startDate = Carbon::createFromFormat('m/d/Y', $request->input('start'))->format('Y-m-d');
    //     $endDate = Carbon::createFromFormat('m/d/Y', $request->input('end'))->format('Y-m-d');
    
    //     $dateRange =  $startDate . ' - ' . $endDate;
    
    //     $monthlyData = [];
        
    //     // Fetch payments with remaining balance within the specified date range
    //     $payments = PaymentInfo::with('loan')  // Eager load the related loan
    //         ->whereBetween('created_at', [$startDate, $endDate])  // Assuming created_at is the timestamp for payment
    //         ->get();
    
    //     // Fetch transaction histories with payment amount within the specified date range
    //     $transactionHistories = Transaction_History::whereBetween('PaymentDate', [$startDate, $endDate])->get();
    
    //     // Fetch loans with loan amount within the specified date range
    //     $loans = LoanInfo::whereBetween('cash_release_date', [$startDate, $endDate])->get();
    
    //     // Fetch loans with loan status 'Loan Active' and 'Paid' within the specified date range
    //     $approvedLoans = LoanInfo::where('loanstatus', 'Loan Active')
    //         ->orWhere('loanstatus', 'Paid')
    //         ->whereBetween('cash_release_date', [$startDate, $endDate])
    //         ->get();
    
    //     $totalBalance = $payments->sum('Remaining_Balance');
    //     $totalPaid = $transactionHistories->sum('PaymentAmount');
    //     $totalLoanAmount = $loans->sum('LoanAmount');
    //     $loanRegistered = $approvedLoans->count();
    //     $borrowers = BorrowerInfo::count(); // Assuming you have a BorrowerInfo model
    
    //     // Calculate the data for each month
    //     $period = CarbonPeriod::create($startDate, '1 month', $endDate);
        
    //     foreach ($period as $date) {
    //         $monthYear = $date->format('M Y');
    
    //         $monthlyData[$monthYear] = [
    //             'totalBalance' => 0,
    //             'totalPaid' => 0,
    //             'totalLoanAmount' => 0,
    //             'loanRegistered' => 0,
    //             'borrowers' => 0,
    //         ];
    
    //         // Calculate total balance for the month
    //         $monthlyData[$monthYear]['totalBalance'] = $payments
    //             ->where('created_at', '>=', $date->startOfMonth())
    //             ->where('created_at', '<=', $date->endOfMonth())
    //             ->sum('Remaining_Balance');
    
    //         // Calculate total paid for the month
    //         $monthlyData[$monthYear]['totalPaid'] = $transactionHistories
    //             ->where('PaymentDate', '>=', $date->startOfMonth())
    //             ->where('PaymentDate', '<=', $date->endOfMonth())
    //             ->sum('PaymentAmount');
    
    //         // Calculate total loan amount for the month
    //         $monthlyData[$monthYear]['totalLoanAmount'] = $loans
    //             ->where('cash_release_date', '>=', $date->startOfMonth())
    //             ->where('cash_release_date', '<=', $date->endOfMonth())
    //             ->sum('LoanAmount');
    
    //         // Calculate loan registered for the month
    //         $monthlyData[$monthYear]['loanRegistered'] = $approvedLoans
    //             ->where('cash_release_date', '>=', $date->startOfMonth())
    //             ->where('cash_release_date', '<=', $date->endOfMonth())
    //             ->count();
    
    //         // Set total borrowers (assuming it's the same for all months)
    //         $monthlyData[$monthYear]['borrowers'] = $borrowers;
    //     }
    
    //     // Calculate totals for all months
    //     $totalBalanceAll = collect($monthlyData)->sum('totalBalance');
    //     $totalPaidAll = collect($monthlyData)->sum('totalPaid');
    //     $totalLoanAmountAll = collect($monthlyData)->sum('totalLoanAmount');
    //     $totalLoanRegisteredAll = collect($monthlyData)->sum('loanRegistered');
    //     $totalBorrowersAll = collect($monthlyData)->sum('borrowers');
    
    //     // Include the total row in the monthly data
    //     $monthlyData['Total'] = [
    //         'totalBalance' => $totalBalanceAll,
    //         'totalPaid' => $totalPaidAll,
    //         'totalLoanAmount' => $totalLoanAmountAll,
    //         'loanRegistered' => $totalLoanRegisteredAll,
    //         'borrowers' => $totalBorrowersAll,
    //     ];
    
    //     // Your existing code...
    //     $selectedMonths = Helper::generateMonthRange($startDate, $endDate);
    
    //     $data = [
    //         'title' => 'Summary Report',
    //         'date' => now(),
    //         'monthlyData' => $monthlyData,
    //         'selectedMonths' => $selectedMonths,
    //         // Add any other necessary data
    //     ];
    
    //     $pdf = PDF::loadView('Reports.report', $data);
    
    //     return $pdf->stream('summary_report.pdf');
    // }


    public function generateReport(Request $request)
{
    $startDate = Carbon::createFromFormat('m/d/Y', $request->input('start'))->format('Y-m-d');
    $endDate = Carbon::createFromFormat('m/d/Y', $request->input('end'))->format('Y-m-d');

    $dateRange =  $startDate . ' - ' . $endDate;

    $monthlyData = [];

  

    $latestPaymentsSubquery = PaymentInfo::select('loan_id', DB::raw('MAX(created_at) as latest_created_at'))
    ->groupBy('loan_id');

$payments = PaymentInfo::with('loan')
    ->whereBetween('created_at', [$startDate, $endDate])
    ->joinSub($latestPaymentsSubquery, 'latest_payments', function ($join) {
        $join->on('paymentInfo.loan_id', '=', 'latest_payments.loan_id')
            ->on('paymentInfo.created_at', '=', 'latest_payments.latest_created_at');
    })
    ->get();

    // Fetch transaction histories with payment amount within the specified date range
    $transactionHistories = Transaction_History::whereBetween('PaymentDate', [$startDate, $endDate])->get();

    // Fetch loans with loan amount within the specified date range
    $loans = LoanInfo::whereBetween('cash_release_date', [$startDate, $endDate])->get();

    // Fetch loans with loan status 'Loan Active' and 'Paid' within the specified date range
    $approvedLoans = LoanInfo::where('loanstatus', 'Loan Active')
    ->orWhere('loanstatus', 'PAID')
    ->whereBetween('cash_release_date', [$startDate, $endDate])
    ->with([
        'borrowerinfo',
        'transactionHistories' => function ($query) {
            $query->with(['paymentInfo']);
        }
    ])
    ->get();

        
    // Get the distinct borrowers based on the approved loans
    $distinctBorrowers = $approvedLoans->pluck('bno')->unique();

    $totalBalance = $payments->sum('Remaining_Balance');
    $totalPaid = $transactionHistories->sum('PaymentAmount');
    $totalLoanAmount = $loans->sum('LoanAmount');
    $loanRegistered = $approvedLoans->count();
    $borrowers = $distinctBorrowers->count(); // Assuming you have a BorrowerInfo model

    // Calculate the data for each month
    $period = CarbonPeriod::create($startDate, '1 month', $endDate);
    
    foreach ($period as $date) {
        $monthYear = $date->format('M Y');

        $monthlyData[$monthYear] = [
            'totalBalance' => 0,
            'totalPaid' => 0,
            'totalLoanAmount' => 0,
            'loanRegistered' => 0,
            'borrowers' => 0,
        ];

        // Calculate total balance for the month
        $monthlyData[$monthYear]['totalBalance'] = $payments
            ->where('created_at', '>=', $date->startOfMonth())
            ->where('created_at', '<=', $date->endOfMonth())
            ->sum('Remaining_Balance');

        // Calculate total paid for the month
        $monthlyData[$monthYear]['totalPaid'] = $transactionHistories
            ->where('PaymentDate', '>=', $date->startOfMonth())
            ->where('PaymentDate', '<=', $date->endOfMonth())
            ->sum('PaymentAmount');

        // Calculate total loan amount for the month
        $monthlyData[$monthYear]['totalLoanAmount'] = $loans
            ->where('cash_release_date', '>=', $date->startOfMonth())
            ->where('cash_release_date', '<=', $date->endOfMonth())
            ->sum('LoanAmount');

        // Calculate loan registered for the month
        $monthlyData[$monthYear]['loanRegistered'] = $approvedLoans
            ->where('cash_release_date', '>=', $date->startOfMonth())
            ->where('cash_release_date', '<=', $date->endOfMonth())
            ->count();

        
        // Calculate distinct borrowers for the month
        $distinctBorrowers = $approvedLoans
        ->where('cash_release_date', '>=', $date->startOfMonth())
        ->where('cash_release_date', '<=', $date->endOfMonth())
        ->pluck('bno')  // Pluck borrower IDs
        ->unique()      // Get unique borrower IDs
        ->count();      // Count distinct borrowers

        $monthlyData[$monthYear]['borrowers'] = $distinctBorrowers;
    }

    // Calculate totals for all months
    $totalBalanceAll = collect($monthlyData)->sum('totalBalance');
    $totalPaidAll = collect($monthlyData)->sum('totalPaid');
    $totalLoanAmountAll = collect($monthlyData)->sum('totalLoanAmount');
    $totalLoanRegisteredAll = collect($monthlyData)->sum('loanRegistered');
    $totalBorrowersAll = collect($monthlyData)->sum('borrowers');

    // Include the total row in the monthly data
    $monthlyData['Total'] = [
        'totalBalance' => $totalBalanceAll,
        'totalPaid' => $totalPaidAll,
        'totalLoanAmount' => $totalLoanAmountAll,
        'loanRegistered' => $totalLoanRegisteredAll,
        'borrowers' => $totalBorrowersAll,
    ];

    // Your existing code...
    $selectedMonths = Helper::generateMonthRange($startDate, $endDate);

    // ANother breakdown
    $totalCollectable = $approvedLoans->sum(function ($loan) {
        // Calculate the total loan amount including interest
        return $loan->LoanAmount * (1 + ($loan->InterestRate / 100));
    });
$totalAmountCollected = $approvedLoans->flatMap(function ($loan) {
    return $loan->transactionHistories->pluck('PaymentAmount');
})->sum();
$remainingCollections = $approvedLoans->flatMap(function ($loan) {
    return $loan->transactionHistories->pluck('paymentInfo.Remaining_Balance');
})->sum();


     $anotherBreakdownData = [
        'totalCollectable' => $totalCollectable,
        'totalAmountCollected' => $totalAmountCollected,
        'remainingCollections' => $remainingCollections,
    ];

    // Individual breakdown
$individualBreakdownData = $approvedLoans->map(function ($loan) {
    return [
        'Name' => $loan->borrowerinfo->borFname . ' ' . $loan->borrowerinfo->borLname,
        'Loan Amount' => $loan->LoanAmount,
        'Loan Pay' => $loan->transactionHistories->sum('PaymentAmount'),
        'Remaining Balance' => $loan->transactionHistories->last()->paymentInfo->Remaining_Balance,
    ];
});

  
    
   // Add breakdown data to the $data array
$data = [
    'title' => 'Summary Report',
    'date' => now(),
    'monthlyData' => $monthlyData,
    'selectedMonths' => $selectedMonths,
    'anotherBreakdownData' => $anotherBreakdownData,
    'individualBreakdownData' => $individualBreakdownData,
    // Add any other necessary data
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

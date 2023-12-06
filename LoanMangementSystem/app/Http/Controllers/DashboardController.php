<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\borrowerinfo;
use App\Models\officerInfo;
use App\Models\loanInfo;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
         // Get the selected date range and loan status from the request
         $dateRange = $request->input('date_range', 'all');
         $loanStatus = $request->input('loan_status', 'all');
 
         // Initialize date filter variables
         $startDate = null;
         $endDate = null;
 
         // Apply date range filter
         if ($dateRange !== 'all') {
             if ($dateRange === 'last_7_days') {
                 $startDate = Carbon::now()->subDays(6)->toDateString();
             } elseif ($dateRange === 'last_30_days') {
                 $startDate = Carbon::now()->subDays(29)->toDateString();
             } elseif ($dateRange === 'last_90_days') {
                 $startDate = Carbon::now()->subDays(89)->toDateString();
             }
         }
 
         // Build the loan query
         $query = loanInfo::query();
 
         // Apply date range filter
         if ($startDate && $endDate) {
             $query->whereBetween('LoanApplication', [$startDate, $endDate]);
         }
 
         // Apply loan status filter
         if ($loanStatus !== 'all') {
             $query->where('loanstatus', $loanStatus);
         }   


        $borrowerCount = borrowerinfo::count();
        $AccountCount = officerInfo::count();
        $LoanCount = loanInfo::count();
        $activeCount = loanInfo::where('loanstatus', 'Loan Active')->count();
        $newLoanCount = loanInfo::where('loanstatus', 'Waiting For Approval')->count();
        $approvedCount = loanInfo::where('loanstatus', 'Approved')->count();
        $rejectedCount = loanInfo::where('loanstatus', 'Rejected')->count();

        return view('dashboard', compact('borrowerCount', 'activeCount', 'newLoanCount', 'approvedCount', 'rejectedCount','AccountCount','LoanCount'));
    }
}

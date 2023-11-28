<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\borrowerinfo;
use App\Models\loanInfo;
class DashboardController extends Controller
{
    public function index()
    {
        $borrowerCount = borrowerinfo::count();
        $activeCount = loanInfo::where('loanstatus', 'Loan Active')->count();
        $newLoanCount = loanInfo::where('loanstatus', 'Waiting For Approval')->count();
        $approvedCount = loanInfo::where('loanstatus', 'Approved')->count();
        $rejectedCount = loanInfo::where('loanstatus', 'Rejected')->count();

        return view('dashboard', compact('borrowerCount', 'activeCount', 'newLoanCount', 'approvedCount', 'rejectedCount'));
    }
}

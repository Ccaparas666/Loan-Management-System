<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\borrowerinfo;

class DashboardController extends Controller
{
    public function index()
    {
        $borrowerCount = borrowerinfo::count();

        // Placeholder logic to calculate the percentage (assuming some target count)
        $totalBorrowers = 1000; // Replace with your actual total or target count
        $borrowerPercentage = ($borrowerCount / $totalBorrowers) * 100;

        return view('dashboard', compact('borrowerCount', 'borrowerPercentage'));
    }
}

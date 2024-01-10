<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\loanInfo;
use App\Models\User;
use PDF;

class PDFController extends Controller
{
    //
    public function generatePDF()
    {
        // $users = User::get();
  
        // $data = [
        //     'title' => 'Welcome to ItSolutionStuff.com',
        //     'date' => date('m/d/Y'),
        //     'users' => $users
        // ]; 
            
        // $pdf = PDF::loadView('Reports/myPDF', $data);
     
        // return $pdf->download('itsolutionstuff.pdf');

        $loans = loanInfo::all(); // Assuming your loan model is named Loan

        // Data to be passed to the PDF view
        $data = [
            'title' => 'Loan Report',
            'date' => now()->format('Y-m-d'),
            'loans' => $loans,
        ];

        // Generate PDF using DomPDF
        $pdf = PDF::loadView('Reports/myPDF', $data);

        // You can customize the PDF options if needed
        // $pdf->setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);

        // Return the PDF to the browser or save it to a file
        return $pdf->stream('loan_report.pdf');
    }
}

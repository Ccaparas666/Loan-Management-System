<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\loanInfo;
use App\Models\borrowerinfo;
use App\Models\paymentInfo;
use App\Helpers\Helper;
use Carbon\Carbon;

class borrowerinfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            $accountNumber = str_pad($i + 1, 5, '0', STR_PAD_LEFT);
    
            $borrower = BorrowerInfo::create([
                'borAccount' => 'BAC-' . $accountNumber,
                'borFname' => 'First Name ' . ($i + 1),
                'borMname' => 'Middle Name ' . ($i + 1),
                'borLname' => 'Last Name ' . ($i + 1),
                'borSuffix' => 'S' . ($i + 1),
                'borContact' => 'Contact ' . ($i + 1),
                'borEmail' => 'email' . ($i + 1) . '@example.com',
                'borDob' => Carbon::createFromDate(rand(1964, 2006), rand(1, 12), rand(1, 28))->format('Y-m-d'),
                'loanstatus' => 'Not Registered',
                'borAddress' => 'Address ' . ($i + 1),
                'borGender' => 'Gender ' . ($i + 1),
                'borPicture' => 'Picture ' . ($i + 1),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    
            // $loanApplicationDate = Carbon::createFromDate(rand(2024, 2026), rand(1, 12), rand(1, 28))->format('Y-m-d');
            // $loanApprovalDate = $loanApplicationDate;
            // $cashReleaseDate = Carbon::createFromDate(rand(2024, 2026), rand(1, 12), rand(1, 28))->format('Y-m-d');
    
            // LoanInfo::create([
            //     'bno' => $borrower->bno,
            //     'approved_by' => null,
            //     'rejected_by' => null,
            //     'created_by' => null,
            //     'loanNumber' => 'LNO-' . str_pad($i + 1, 5, '0', STR_PAD_LEFT),
            //     'Reason' => 'Reason ' . ($i + 1),
            //     'LoanAmount' => rand(5000, 20000),
            //     'InterestRate' => rand(5, 15),
            //     'LoanApplication' => $loanApplicationDate,
            //     'loan_approval_date' => $loanApprovalDate,
            //     'cash_release_date' => $cashReleaseDate,
            //     'loanstatus' => 'Loan Active',
            //     'cmName' => 'CM Name ' . ($i + 1),
            //     'cmContact' => 'CM Contact ' . ($i + 1),
            //     'cmEmail' => 'cmemail' . ($i + 1) . '@example.com',
            //     'cmAddress' => 'CM Address ' . ($i + 1),
            //     'created_at' => Carbon::createFromDate(rand(2024, 2026), rand(1, 12), rand(1, 28))->format('Y-m-d H:i:s'),
            //     'updated_at' => now(),
            // ]);
        }

//         $loans = LoanInfo::all();

// foreach ($loans as $loan) {
//     $paymentCount = 1; // You want to create exactly 1 payment per loan

//     for ($i = 0; $i < $paymentCount; $i++) {
//         $dueDate = Carbon::createFromDate(rand(2024, 2026), rand(1, 12), rand(1, 28))->format('Y-m-d');

//         $remainingBalance = ($loan->InterestRate / 100) * $loan->LoanAmount + $loan->LoanAmount;

//         PaymentInfo::create([
//             'loan_id' => $loan->lid,
//             'Remaining_Balance' => $remainingBalance,
//             'due_date' => $dueDate,
//             'created_at' => Carbon::createFromDate(rand(2024, 2026), rand(1, 12), rand(1, 28))->format('Y-m-d H:i:s'),
//             'updated_at' => now(),
//         ]);
//     }
// }
    }
}

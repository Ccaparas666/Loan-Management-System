<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\loanInfo;
use App\Models\borrowerinfo;
use App\Models\paymentInfo;
use App\Helpers\Helper;
class borrowerinfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // \App\Models\borrowerinfo::factory(10)->create();
        for ($i = 0; $i < 50; $i++) {
            $accountNumber = str_pad($i + 1, 5, '0', STR_PAD_LEFT);
        
            DB::table('borrowerinfo')->insert([
                'borAccount' => 'BAC-' . $accountNumber,
                'borFname' => 'First Name ' . ($i + 1),
                'borMname' => 'Middle Name ' . ($i + 1),
                'borLname' => 'Last Name ' . ($i + 1),
                'borSuffix' => 'S' . ($i + 1),
                'borContact' => 'Contact ' . ($i + 1),
                'borEmail' => 'email' . ($i + 1) . '@example.com',
                'borDob' => now()->subYears(rand(18, 60))->format('Y-m-d'), // Random date between 18 and 60 years ago
                'loanstatus' => 'Loan Active',
                'borAddress' => 'Address ' . ($i + 1),
                'borGender' => 'Gender ' . ($i + 1),
                'borPicture' => 'Picture ' . ($i + 1),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        

        $borrowers = borrowerinfo::all();

        foreach ($borrowers as $borrower) {
            $loanCount = rand(1, 5); // Adjust the number of loans per borrower as needed

            for ($i = 0; $i < $loanCount; $i++) {
                $loanApplicationDate = now()->subMonths(rand(1, 12))->format('Y-m-d');
                $loanApprovalDate = $loanApplicationDate; // Set initially to the application date
                $cashReleaseDate = now()->addYears(rand(1, 2))->format('Y-m-d');
                loanInfo::create([
                    'bno' => $borrower->bno,
                    'approved_by' => null,
                    'rejected_by' => null,
                    'created_by' => null,
                    'loanNumber' => Helper::LoanNumberGenerator(new loanInfo, 'loanNumber', 5, 'LOAN'),
                    'Reason' => 'Reason ' . ($i + 1),
                    'LoanAmount' => rand(5000, 20000),
                    'InterestRate' => rand(5, 15),
                    'LoanApplication' => $loanApplicationDate,
                    'loan_approval_date' => $loanApprovalDate,
                    'cash_release_date' => $cashReleaseDate,
                    'loanstatus' => 'Not Registered',
                    'cmName' => 'CM Name ' . ($i + 1),
                    'cmContact' => 'CM Contact ' . ($i + 1),
                    'cmEmail' => 'cmemail' . ($i + 1) . '@example.com',
                    'cmAddress' => 'CM Address ' . ($i + 1),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        $loans = loanInfo::all();

        foreach ($loans as $loan) {
            $paymentCount = rand(1, 5); // Adjust the number of payments per loan as needed

            for ($i = 0; $i < $paymentCount; $i++) {
                $dueDate = now()->addMonths($i + 1)->format('Y-m-d'); // Set due date to be one month apart

                paymentInfo::create([
                    'loan_id' => $loan->lid,
                    'Remaining_Balance' => rand(1000, 5000),
                    'due_date' => $dueDate,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}

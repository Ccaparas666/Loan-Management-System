<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
class loanInfo extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'lid';

    protected $table = 'loanInfo';

    protected $dates = ['LoanApplication'];

    protected $fillable =[
        
        'bno',
        'loanNumber',
       
        'LoanAmount',
        'InterestRate',
        'LoanApplication',
        'loan_approval_date',
        'cash_release_date',
        'loanstatus',
        'cmName',
        'cmContact',
        'cmEmail',
        'cmAddress',
        'Reason'
    ];
    // 'LoanTerm',
    public function borrowerinfo()
{
    return $this->belongsTo(borrowerinfo::class, 'bno', 'bno');
}

public function payments()
{
    return $this->hasMany(paymentInfo::class, 'loan_id', 'lid');
}

public function latestPaymentForLoan($loanId)
{
    return $this->payments()
        ->where('loan_id', $loanId)
        ->latest('created_at')
        ->first();
}

public static function latestLoanForBorrower($bno)
{
    return static::where('bno', $bno)
        ->latest('created_at')
        ->first();
}

public function calculateBalance()
{
    if ($this->payments->isEmpty()) {
        return $this->LoanAmount; // If no payments, return the original loan amount
    }

    // Calculate the balance based on payments
    return $this->LoanAmount - $this->payments->sum('Remaining_Balance');
}

public function transactionHistories()
{
    return $this->hasMany(Transaction_History::class, 'loan_id', 'lid');
}
}

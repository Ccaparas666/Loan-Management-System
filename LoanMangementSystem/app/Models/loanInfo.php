<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loanInfo extends Model
{
    use HasFactory;
    protected $primaryKey = 'lid';

    protected $table = 'loanInfo';

    protected $fillable =[
        
        'bno',
        'loanNumber',
        'LoanTerm',
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
    ];

    public function borrowerinfo()
    {
        return $this->hasOne(BorrowerInfo::class, 'bno', 'bno'); 
    }
}

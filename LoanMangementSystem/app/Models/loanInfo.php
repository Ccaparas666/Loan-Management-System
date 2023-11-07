<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loanInfo extends Model
{
    use HasFactory;
    protected $table = 'loanInfo';

    protected $fillable =[
        
        'bno',
        'LoanTerm',
        'LoanAmount',
        'InterestRate',
        'LoanApplication',
        'LoanApproval',
        'LoanDisbursement',
        'loanstatus',
        'Colateral',
        'coMaker',
    ];
}

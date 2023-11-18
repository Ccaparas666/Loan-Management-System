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
        'loanNumber',
        'LoanTerm',
        'LoanAmount',
        'InterestRate',
        'LoanApplication',
        'loanstatus',
        'cmName',
        'cmContact',
        'cmEmail',
        'cmAddress',
    ];
}

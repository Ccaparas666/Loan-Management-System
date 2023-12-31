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
    // 'LoanTerm',
    public function borrowerinfo()
{
    return $this->belongsTo(borrowerinfo::class, 'bno', 'bno');
}

public function payments()
{
    return $this->hasMany(paymentInfo::class, 'loan_id', 'lid');
}
}

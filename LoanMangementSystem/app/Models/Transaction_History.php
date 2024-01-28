<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
class Transaction_History extends Model
{
    use HasFactory;

    protected $primaryKey = 'TH';
    protected $table = 'Transaction_History';

    protected $fillable = [
        'PaymentDate',
        'PaymentAmount',
        'RemainingBalance',
        'ReferenceNumber',
        'borrower_id',
        'loan_id',
    ];

    public function borrower()
    {
        return $this->belongsTo(BorrowerInfo::class, 'borrower_id', 'bno');
    }

    public function paymentInfo()
{
    return $this->hasOneThrough(
        PaymentInfo::class,
        LoanInfo::class,
        'lid', // Foreign key on loanInfo table
        'loan_id', // Foreign key on paymentInfo table
        'borrower_id', // Local key on borrowerinfo table
        'bno' // Local key on loanInfo table
    );
}

public function loan()
{
    return $this->belongsTo(LoanInfo::class, 'loan_id', 'lid');
}

    
}

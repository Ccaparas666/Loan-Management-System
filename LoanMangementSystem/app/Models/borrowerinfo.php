<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use App\Models\Transaction_History;

class borrowerinfo extends Model
{
    use HasFactory;
    protected $primaryKey = 'bno';
    protected $table = 'borrowerinfo';

    protected $fillable = [
        'borAccount',
        'borFname',
        'borMname',
        'borLname',
        'borSuffix',
        'borContact',
        'borEmail',
        'borDob',
        'borAddress',
        'borGender',
        'loanstatus',
        'borPicture',
    ];

    
    protected static function boot()
    {
        parent::boot();
    
        static::saving(function ($model) {
            $fieldsToFormat = ['borFname', 'borMname', 'borLname', 'borSuffix'];
    
            foreach ($fieldsToFormat as $field) {
                // Ensure only the first letter is uppercase
                $model->$field = ucfirst(strtolower($model->$field));
            }
        });
    
        static::updating(function ($model) {
            $fieldsToFormat = ['borFname', 'borMname', 'borLname', 'borSuffix'];
    
            foreach ($fieldsToFormat as $field) {
                // Ensure only the first letter is uppercase
                $model->$field = ucfirst(strtolower($model->$field));
            }
        });
    }
    

    public function loans()
    {
        return $this->hasMany(LoanInfo::class, 'bno', 'bno');
    }

    public function transactionHistories()
{
    return $this->hasMany(Transaction_History::class, 'borrower_id', 'bno');
}
public function paymentInfos()
{
    return $this->hasMany(PaymentInfo::class);
}

public function calculateTotalPaymentAmount($loanId)
{
    return $this->transactionHistories
        ->where('loan_id', $loanId)
        ->sum('PaymentAmount');
}


public function calculateBalance($loanId)
{
    $loan = $this->loans->find($loanId);

    if (!$loan) {
        return 0; // If loan not found, return 0
    }

    return $loan->latestRemainingBalance();
}




public function totalPayments()
{
    $totalPaymentAmount = $this->transactionHistories->sum('PaymentAmount');
    return $totalPaymentAmount;
}

    

    
}

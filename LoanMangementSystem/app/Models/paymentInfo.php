<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paymentInfo extends Model
{
    use HasFactory;
    protected $table = 'paymentInfo';
    protected $fillable = ['loan_id', 'due_date','Remaining_Balance'];

    public function loan()
    {
        return $this->belongsTo(LoanInfo::class, 'loan_id', 'lid');
    }
}

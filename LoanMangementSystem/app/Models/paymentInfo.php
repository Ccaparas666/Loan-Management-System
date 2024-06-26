<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
class paymentInfo extends Model
{
    use HasFactory;
    protected $table = 'paymentInfo';
    protected $primaryKey = 'pno';
    protected $fillable = ['loan_id', 'due_date','Remaining_Balance'];

    public function loan()
    {
        return $this->belongsTo(LoanInfo::class, 'loan_id', 'lid');
    }
}

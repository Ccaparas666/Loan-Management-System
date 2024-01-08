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
    ];

    public function borrower()
    {
        return $this->belongsTo(BorrowerInfo::class, 'borrower_id', 'bno');
    }
}

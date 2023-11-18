<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loansettings extends Model
{
    use HasFactory;

    protected $table = 'loansettings';

    protected $fillable =[
        
        'Interest',
        'LoanTerm',
        
    ];
}

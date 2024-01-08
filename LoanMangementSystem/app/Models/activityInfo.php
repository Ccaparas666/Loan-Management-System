<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activityInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'log_name',
        'description',
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
}

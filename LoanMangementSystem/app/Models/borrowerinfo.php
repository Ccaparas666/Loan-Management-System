<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class borrowerinfo extends Model
{
    use HasFactory;

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
    ];
}

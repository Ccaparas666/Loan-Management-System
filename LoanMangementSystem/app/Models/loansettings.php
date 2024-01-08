<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
class loansettings extends Model
{
    use HasFactory;
    protected $primaryKey = 'lsid';
    protected $table = 'loansettings';

    protected $fillable =[
        
        'Interest',
        
    ];
}

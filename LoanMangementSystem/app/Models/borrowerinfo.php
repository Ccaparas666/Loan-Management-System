<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;


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

    

    
}

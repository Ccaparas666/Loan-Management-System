<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];

    
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $fieldsToFormat = ['borFname', 'borMname', 'borLname', 'borSuffix'];

            foreach ($fieldsToFormat as $field) {
                $model->$field = ucfirst(strtolower($model->$field));
            }
        });
    }

    public function loans()
    {
        return $this->hasMany(LoanInfo::class, 'bno', 'bno');
    }

    
}

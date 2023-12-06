<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class officerInfo extends Model

{

    use HasApiTokens, HasFactory, Notifiable;


    use HasFactory;
    protected $table = 'officerinfo';
    protected $primaryKey = 'ono';

    protected $fillable = [

        'offId',
        'offFname',
        'offMname',
        'offLname',
        'offSuffix',
        'offContact',   
        'offAddress',
        'offDob',
        'offGender',
        'offEmail',
        'offpassword',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'offpassword',
       
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];


    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            // Capitalize the first letter and make the rest lowercase for specific fields
            $fieldsToFormat = ['offFname', 'offMname', 'offLname', 'offSuffix'];

            foreach ($fieldsToFormat as $field) {
                $model->$field = ucfirst(strtolower($model->$field));
            }
        });

        static::updating(function ($model) {
            // Capitalize the first letter and make the rest lowercase for specific fields
            $fieldsToFormat = ['offFname', 'offMname', 'offLname', 'offSuffix'];
    
            foreach ($fieldsToFormat as $field) {
                $model->$field = ucfirst(strtolower($model->$field));
            }
        });
    }
}

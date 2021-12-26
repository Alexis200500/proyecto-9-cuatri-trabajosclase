<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sinfoto extends Model
{
    use HasFactory;
    protected $fillable=[
        'nombres',
        'apellidopa',
        'sex',
        'eda',
        'telefon',
        'emai',
        'pas',
    ];
}

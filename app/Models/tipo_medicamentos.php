<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class tipo_medicamentos extends Model
{
    use HasFactory;
    use Softdeletes;
    protected $primaryKey='idtipomed';
    protected $fillable=['idtipomed','tipo',];
}

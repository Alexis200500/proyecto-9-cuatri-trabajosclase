<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class estudio extends Model
{
    use Softdeletes;
    use HasFactory;
    protected $primaryKey='idestudio';
    protected $fillable=
    [
      'nombre',
      'tipo',
      
    ];
}

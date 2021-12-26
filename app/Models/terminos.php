<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class terminos extends Model
{
    use HasFactory;
    protected $primaryKey='idtermino';
    protected $fillable=
    [
      'usuario',
      'correo',
      'contraseña',
      'terminos'
    ];
}

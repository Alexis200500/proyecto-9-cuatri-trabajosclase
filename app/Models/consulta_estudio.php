<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class consulta_estudio extends Model
{
    use Softdeletes;
    use HasFactory;
    protected $primaryKey='idces';
    protected $fillable=
    [
      'idconsulta',
      'idestudio',
      'idpaciente',
      'fecha_estudio',
      'hora_estudio',
      'obervaciones',
      'archivo',
    ];
}

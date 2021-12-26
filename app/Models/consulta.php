<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class consulta extends Model
{
    use Softdeletes;
    use HasFactory;
    protected $primaryKey='idconsulta';
    protected $fillable=
    [
      'idpaciente',
      'idodo',
      'fecha_consulta',
      'hora_consulta',
      'peso',
      'estatura',
      'costo',
      'idstatus',
      
    ];
}

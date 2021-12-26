<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;


class tipo_usuario extends Model
{
    use Softdeletes;
    use HasFactory;
    protected $primaryKey='idtipo_u';
    protected $fillable=
    [
      'tipo'
    ];
}

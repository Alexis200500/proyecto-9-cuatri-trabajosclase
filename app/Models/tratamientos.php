<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class tratamientos extends Model
{
  use HasFactory;
  use Softdeletes;
  protected $primaryKey='idtratamiento';
  protected $fillable=['idtratamiento','nombre','duracion','medicamento','precio'];
}

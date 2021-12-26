<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class material_odontologico extends Model
{
    use HasFactory;
    use Softdeletes;
    protected $primaryKey='idmaterial';
    protected $fillable=['idmaterial','nombre','marca','precio','fechareg','horareg','pzas_exis','lote'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class medicamentos extends Model
{
    use HasFactory;
    use Softdeletes;
    protected $primaryKey='idmed';
    protected $fillable=['idmed','nombre','idtipomed','presentacion','susta_activa'];
}

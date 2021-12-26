<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class especialidades extends Model
{
    use HasFactory;
    use Softdeletes;
    protected $primaryKey='idesp';
    protected $fillable=['idesp','especialidad'];
}

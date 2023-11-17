<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'asignatura',
        'trimestre',
        'fecha',
        'hora_inicio',
        'hora_fin',
        'grado',
        'seccion',
        'aprendizaje',
        'consideraciones',
        'articula',
        'estrategias',
        'descripcion',
        'observaciones',
    ];
}

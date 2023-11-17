<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    use HasFactory;

    // Indicar la tabla asociada al modelo
    protected $table = 'bitacora';

    // Indicar los campos que se pueden asignar masivamente
    protected $fillable = [
        'user_id',
        'veces_reservado',
        'grado',
        'seccion',
        'fecha',
        'hora',
    ];
    

    // Indicar la relación con el modelo Docente
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
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
        'dia',
        'hora',
        'grado',
        'seccion',
        'aprendizaje',
        'consideraciones',
        'articula',
        'estrategias',
        'descripcion',
        'observaciones',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function reservaStatistics() {
        return $this->hasOne(ReservaStatistics::class);
    }
    public function asDocenteAppointments(){
        return $this->hasMany(Specialty::class,'user_id');
    }

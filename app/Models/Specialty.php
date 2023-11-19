<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SpecialtyLog;
use Illuminate\Http\Request;

class Specialty extends Model
{

    use HasFactory;

    protected $fillable = [
        'nombre',
        'asignatura',
        'trimestre',
        'fecha',
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
    public function reservaStatistics()
    

{
    return $this->hasOne(ReservaStatistics::class);
    
}
public function asDocenteAppointments(){
    return $this->hasMany(Specialty::class,'user_id');
}

public function getHora12Attribute()
{
    // Supongamos que 'hora' es un atributo en formato de 24 horas almacenado en la base de datos
    $hora24 = $this->attributes['hora'];

    // Formatear la hora a un formato de 12 horas
    $hora12 = date('h:i A', strtotime($hora24));

    return $hora12;
}

// app/Models/Specialty.php
public function logs()
{
    return $this->hasMany(SpecialtyLog::class, 'specialty_id');
}
protected static function boot()
    {
        parent::boot();

        static::deleting(function ($specialty) {
            // Eliminar la entrada correspondiente en la bitácora
            SpecialtyLog::where('specialty_id', $specialty->id)->delete();
        });
    }

    // Relación con SpecialtyLog
    public function specialtyLog()
    {
        return $this->hasOne(SpecialtyLog::class, 'specialty_id');
    }


}
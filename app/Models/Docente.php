<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Docente extends User
{
    use HasFactory;

    // Indicar la tabla asociada al modelo
    protected $table = 'docentes';

    // Indicar los campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
        'email',
        'password',
        'rol',
    ];

    // Indicar los campos que se deben ocultar
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Indicar los campos que se deben convertir
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Indicar la relación con el modelo Bitacora
    public function bitacora()
    {
        return $this->hasMany(Bitacora::class);
    }
}

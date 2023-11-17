<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpecialtyLog extends Model
{
    // Nombre de la tabla en la base de datos
    protected $table = 'specialty_logs';

    // Claves primarias
    protected $primaryKey = 'id';
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Lista de campos que pueden ser llenados
    protected $fillable = [
        'user_id',
        'fecha',
        'description',
        'date',
    ];

    // Otros métodos y relaciones del modelo si es necesario
}
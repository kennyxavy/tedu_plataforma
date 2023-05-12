<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudRecarga extends Model
{
    use HasFactory;
    protected $table = 'solicitud_recargas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'user_id', 'fecha', 'valor', 'rutaarchivo', 'detalle', 'aprobado', 'aprobadopor', 'aprobadodate', 'bancoprocedencia'
    ];
}
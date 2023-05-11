<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudRetiro extends Model
{
    use HasFactory;

    protected $table = 'solicitud_retiros';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 'user_id', 'fecha', 'banco_benificiario ', 'tipo_cta', 'num_cta_bancaria', 'cantidad', 'saldo', 'rutaarchivo', 'transferido', 'aprobado', 'aprobadopor', 'aprobadodate'
    ];
}

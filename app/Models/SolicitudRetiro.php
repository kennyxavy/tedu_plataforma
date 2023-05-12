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
        'id', 'user_id', 'valor', 'detalle', 'saldo', 'cantidad', 'rutaarchivo',  'fecha', 'transferido', 'aprobado', 'aprobadopor', 'aprobadodate', 'banco_benificiario ', 'tipo_cta', 'num_cta_bancaria'
    ];
}
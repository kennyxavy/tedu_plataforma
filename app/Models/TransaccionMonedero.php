<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaccionMonedero extends Model
{
    use HasFactory;

    protected $table = 'transaccion_monedero';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','user_id','dni','micodigo','tipo','fecha','valor','detalle','observacion','pedido_id','solicitud_id','pagosocio','pagadopor'
    ];
}

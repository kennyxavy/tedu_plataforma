<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoCab extends Model
{
    use HasFactory;

    protected $table = 'pedido_cab';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','fecha','user_id','anulado','despachado','total','fee','envio','mentor','lugarenvio'
    ];
}

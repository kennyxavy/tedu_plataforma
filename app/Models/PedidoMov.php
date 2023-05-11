<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoMov extends Model
{
    use HasFactory;

    protected $table = 'pedido_mov';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','pedido_id','producto_id','cantidad','precio','subtotal','total','iva','costo','descuento','totalfinal'
    ];
}

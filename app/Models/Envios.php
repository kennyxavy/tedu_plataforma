<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Envios extends Model
{
    use HasFactory;
    protected $table = 'maestro_envios';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','user_id',
        'destino','precio','anulado',
      
    ];
}

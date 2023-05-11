<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComentarioProducto extends Model
{
    use HasFactory;
    protected $table = 'comentario_productos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','producto_id',
        'user_id','comentario',
    ];
}

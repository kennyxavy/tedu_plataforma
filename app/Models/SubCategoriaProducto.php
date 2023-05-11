<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoriaProducto extends Model
{
    use HasFactory;

    protected $table = 'subcategoria_productos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','nombre','anulado','id_categoria_productos'
    ];
}

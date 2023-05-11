<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulos extends Model
{
    use HasFactory;
    protected $table = 'modulos_cursos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','categoria_cursos_id','nombre','detalle','linkvideo','anulado',
    ];
}

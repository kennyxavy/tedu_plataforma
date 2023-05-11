<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModulosFinalizar extends Model
{
    use HasFactory;
    protected $table = 'finalizado_modulos_cursos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','user_id','modulos_cursos_id','finalizado'
    ];
}

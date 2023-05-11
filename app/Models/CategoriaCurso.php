<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaCurso extends Model
{
    use HasFactory;

    protected $table = 'categoria_cursos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','nombre',
    ];
}

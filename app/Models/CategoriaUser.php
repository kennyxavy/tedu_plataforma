<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaUser extends Model
{
    use HasFactory;

    protected $table = 'categoria_users';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','nombre',
    ];

   
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingProducto extends Model
{
    use HasFactory;
    protected $table = 'rating_producto';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','user_id','producto_id','cantidad'
    ];
}

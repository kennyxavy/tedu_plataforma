<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingProveedor extends Model
{
    use HasFactory;
    protected $table = 'rating_proveedor';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','proveedor_id','user_id','cantidad'
    ];
}

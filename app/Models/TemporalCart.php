<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemporalCart extends Model
{
    use HasFactory;

    protected $table = 'tmp_cart';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','user_id','producto_id','cantidad',
    ];

}

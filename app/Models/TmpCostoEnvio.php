<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TmpCostoEnvio extends Model
{
    use HasFactory;
    protected $table = 'tmp_costoenvio';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','user_id','costo','ciudad',
    ];
}

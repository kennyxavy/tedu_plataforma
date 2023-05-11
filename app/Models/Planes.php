<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planes extends Model
{
    use HasFactory;

    protected $table = 'planes';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','nombre','descripcion','valor','default','archivoimagen'
    ];
}

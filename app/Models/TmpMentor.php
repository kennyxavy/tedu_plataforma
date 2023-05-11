<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TmpMentor extends Model
{
    use HasFactory;
    protected $table = 'tmp_mentor';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','user_id','mentor'
    ];
}

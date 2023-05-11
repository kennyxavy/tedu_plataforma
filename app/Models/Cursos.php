<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Planes;
use App\Models\CategoriaCurso;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Cursos extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'cursos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','nombre',
        'categoria_cursos_id','plan_id','costo',
        'descripcion','free','fecha_desde',
        'fecha_hasta','link',
        'tutor','anulado','archivo',
    ];

    public function plan(){
        /**
         * Get the user associated with the User
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasOne
         */        
        return $this->hasOne(Planes::class);
    }

    public function categoria(){
        /**
         * Get the user associated with the User
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasOne
         */        
        return $this->hasOne(CategoriaCurso::class, 'id', 'categoria_cursos_id');
    }
}

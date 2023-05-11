<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoriaProducto;
use App\Models\SubCategoriaProducto;

class Productos extends Model
{
    use HasFactory;

    protected $table = 'productos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','user_id','nombre','slug','codbar','categoria_id',
        'subcategoria_id','detalle','precio','marca','rutaimagen','anulado','publicado','detalletecnico',
        'autorizado','autorizadopor','autorizadodate','costo','descuentoreferencia','rutaimagen2',
        'rutaimagen3','rutaimagen4','rutaimagen5',
    ];

    public function obtienecategoria(){
        /**
         * Get the user associated with the User
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasOne
         */        
        return $this->hasOne(CategoriaProducto::class, 'id', 'categoria_id');
    }

    public function obtienesubcategoria(){
        /**
         * Get the user associated with the User
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasOne
         */        
        return $this->hasOne(SubCategoriaProducto::class, 'id', 'subcategoria_id');
    }
}

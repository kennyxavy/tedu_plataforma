<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
    	'celular',
    	'referente',
        'password',
    	'dni',
    	'codmentor',
        'nombres',
        'apellidos',
        'plan_id',
        'categoria_users_id',
        'aceptatermino',
        'micodigo',
        'confirmation_code',
        'fechaaceptatermino',
        'fnacimiento',
        'direccion',
        'datosupdate',
        'saldo',
        'nacionalidad',
        'tipocuenta',
        'numerocuenta',
        'banco'
        ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function categoriausers(){
        /**
         * Get the user associated with the User
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasOne
         */        
        return $this->hasOne(CategoriaUser::class, 'id', 'categoria_users_id');
    }

    public function plan(){
        /**
         * Get the user associated with the User
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasOne
         */        
        return $this->hasOne(Planes::class, 'id', 'plan_id');
    }
}

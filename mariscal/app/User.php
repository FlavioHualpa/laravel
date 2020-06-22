<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cuit', 'razon_social', 'email', 'password',
        'id_lista', 'id_vendedor', 'id_rol',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function lista_de_precios()
    {
        return $this->hasOne(ListaDePrecio::class);
    }

    public function rol()
    {
        return $this->hasOne(Rol::class);
    }

    public function vendedor()
    {
        return $this->hasOne(User::class);
    }
}

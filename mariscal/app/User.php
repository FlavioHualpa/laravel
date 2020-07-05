<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
   CONST ROL_ADMIN = 'Administrador';
   CONST ROL_VEND = 'Vendedor';
   
   use Notifiable;
   
   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
   protected $fillable = [
      'cuit', 'razon_social', 'email', 'password',
      'id_lista', 'id_vendedor', 'id_rol',
      'domicilio', 'localidad', 'codigo_postal',
      'telefono', 'codigo_erp'
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
      return $this->belongsTo(ListaDePrecio::class, 'id_lista');
   }
   
   public function rol()
   {
      return $this->belongsTo(Rol::class, 'id_rol');
   }
   
   public function vendedor()
   {
      return $this->belongsTo(User::class, 'id_vendedor');
   }

   public function sucursales()
   {
      return $this->hasMany(Sucursal::class, 'id_usuario');
   }

   public function transportes()
   {
      return $this
         ->belongsToMany(
            Transporte::class,
            'transporte_user',
            'id_usuario',
            'id_transporte')
         ->orderBy('orden')
         ->using(TransporteUser::class);
   }
   
   public function esAdminVendedor()
   {
      $rol = $this->rol->nombre;
      
      return $rol == self::ROL_ADMIN || $rol == self::ROL_VEND;
   }
   
   public static function getCurrentCustomer()
   {
      $customer = null;
      
      //
      // Si estamos logueados como vendedor
      // el cliente va a ser el que seleccionó
      // el vendedor al ingresar, si no, es el
      // propio cliente
      //

      if (auth()->check())
      {
         if (session()->has(
            config('auth.session_customer_key')
            )) {
            $customer = session(
               config('auth.session_customer_key')
            );
         }
         else
         {
            $customer = auth()->user();
         }
      }
      
      return $customer;
   }
}

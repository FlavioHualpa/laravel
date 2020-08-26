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
      'id_domicilio', 'id_lista', 'id_vendedor', 'id_rol',
      'codigo_erp', 'marca'
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

   public function domicilio()
   {
      return $this->belongsTo(Domicilio::class, 'id_domicilio');
   }

   public function domicilios()
   {
      return $this->hasMany(Domicilio::class, 'id_usuario')
         ->orderBy('es_central', 'desc')
         ->orderBy('domicilio');
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

   public function esAdmin()
   {
      return $this->rol->nombre == self::ROL_ADMIN;
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

   public static function vendedoresPorNombre()
   {
      $id_rol_vend = Rol::getIdByName(self::ROL_VEND);
      
      return self::where('id_rol', $id_rol_vend)
         ->orderBy('razon_social')
         ->get();
   }
}

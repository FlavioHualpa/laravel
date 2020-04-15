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
      'name', 'username', 'email', 'password',
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

   public function follows()
   {
      return $this->belongsToMany(
         User::class,
         'follows',
         'user_id',
         'follows_id'
      )
      ->withPivot('follows_id')
      ->withTimeStamps();
   }

   public function followed_by()
   {
      return $this->belongsToMany(
         User::class,
         'follows',
         'follows_id',
         'user_id'
      )
      ->withPivot('follows_id')
      ->withTimeStamps();
   }

   public function tweets()
   {
      return $this->hasMany(Tweet::class);
   }

   public function reactions()
   {
      return $this->hasMany(Reaction::class);
   }
}

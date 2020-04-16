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

   public function is_following(User $user)
   {
      return $this->follows()
         ->where('follows_id', $user->id)
         ->exists();
   }

   public function is_followed_by(User $user)
   {
      return $this->followed_by()
         ->where('user_id', $user->id)
         ->exists();
   }

   public function follows_status(User $user)
   {
      if ($this->is_following($user)) {
         return 'Siguiendo a';
      }
      else if ($this->is_followed_by($user)) {
         return 'Siendo seguido por';
      }
      else {
         return 'Sin seguimientos';
      }
   }

   public function tweets()
   {
      return $this->hasMany(Tweet::class)->latest();
   }

   public function reactions()
   {
      return $this->hasMany(Reaction::class);
   }

   public function timeline()
   {
      $followers = $this->follows()
         ->pluck('follows_id')
         ->push($this->id);

      return Tweet::whereIn('user_id', $followers)
               ->with('reactions')
               ->latest()
               ->get();
   }
}

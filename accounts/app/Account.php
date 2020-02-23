<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Account extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    public function states()
    {
        return $this->hasMany(State::class);
    }

    public function conditions()
    {
        return $this->hasMany(Condition::class);
    }

    public function getAvatarCssAttribute()
    {
        return "background-image: url('" . asset('img/admin_avatar.png') . "'); background-size: 40px 40px;";
    }
}

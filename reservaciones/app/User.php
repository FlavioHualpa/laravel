<?php

namespace App;

use App\Job;
use App\Image;
use App\Testimony;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $dates = [
        'user.pivot.check_in',
        'user.pivot.check_out',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'id_num',
        'email',
        'job_id',
        'password',
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

    public function fullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function testimonies()
    {
        return $this->hasMany(Testimony::class);
    }

    public function reservations()
    {
        return $this
            ->belongsToMany(Room::class, 'reservations')
            ->withPivot( ['check_in', 'check_out', 'invoice_id' ] )
            ->withTimeStamps();
    }
}

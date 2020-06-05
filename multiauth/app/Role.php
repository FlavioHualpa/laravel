<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name'
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function users()
    {
        return $this->morphedByMany(User::class, 'roleable');
    }

    public function delegates()
    {
        return $this->morphedByMany(Delegate::class, 'roleable');
    }

    public function supervisors()
    {
        return $this->morphedByMany(Supervisor::class, 'roleable');
    }

    public function admins()
    {
        return $this->morphedByMany(Admin::class, 'roleable');
    }
}

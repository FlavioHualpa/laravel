<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_names',
        'last_names',
        'dni',
        'birth_date',
        'telephone',
        'email',
        'password',
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}

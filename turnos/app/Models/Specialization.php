<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function professionals()
    {
        return $this->belongsToMany(
            Professional::class,
            'professional_specialization'
        )
        ->withTimestamps()
        ->withPivot('id')
        ->using(ProfessionalSpecialization::class);
    }
}

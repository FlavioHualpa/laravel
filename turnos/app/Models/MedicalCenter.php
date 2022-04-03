<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalCenter extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'city',
        'state',
        'zip_code',
        'telephone',
    ];

    public function specializations()
    {
        return $this->belongsToMany(
            ProfessionalSpecialization::class,
            'professional_disponibility',
            'medical_center_id'
        )
        ->using(ProfessionalDisponibility::class)
        ->withTimestamps()
        ->withPivot(['week_day', 'time']);
    }
}

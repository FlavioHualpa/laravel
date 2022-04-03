<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProfessionalSpecialization extends Pivot
{
    protected $fillable = [
        'specialization_id',
        'professional_id',
    ];

    public function professional()
    {
        return $this->belongsTo(Professional::class);
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }

    public function medicalCenters()
    {
        return $this->belongsToMany(
            MedicalCenter::class,
            'professional_disponibility',
            'professional_specialization_id'
        )
        ->using(ProfessionalDisponibility::class)
        ->withTimestamps()
        ->withPivot(['week_day', 'time']);
    }
}

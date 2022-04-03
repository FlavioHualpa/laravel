<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProfessionalDisponibility extends Pivot
{
    protected $fillable = [
        'medical_center_id',
        'professional_specialization_id',
        'week_day',
        'time',
    ];

    public function professionalSpecialization()
    {
        return $this->belongsTo(ProfessionalSpecialization::class);
    }
}

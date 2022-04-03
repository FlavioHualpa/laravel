<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_names',
        'last_names',
        'license_number',
    ];

    public function specializations()
    {
        return $this->belongsToMany(
            Specialization::class,
            'professional_specialization'
        )
        ->withTimestamps()
        ->withPivot('id')
        ->using(ProfessionalSpecialization::class);
    }

    public function worksOn()
    {
        $mdcenters = collect();

        $this->specializations->each(
            function ($item, $key) use($mdcenters) {
                $mdcenters->push(...$item->pivot->medicalCenters);
            }
        );
        
        return $mdcenters;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'professional_specialization_id',
        'affiliate_id',
        'number',
        'date',
        'state',
    ];

    public function affiliate()
    {
        return $this->belongsTo(Affiliate::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = [
        'questionnaire_id',
        'taker_name',
        'taker_email',
    ];

    public function questionnaire()
    {
        return $this->belongsTo(Questionnaire::class);
    }

    public function surveyResponses()
    {
        return $this->hasMany(SurveyResponse::class);
    }
}

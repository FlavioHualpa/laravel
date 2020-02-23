<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyResponse extends Model
{
    protected $fillable = [
        'survey_id',
        'choice_id',
    ];

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }

    public function choice()
    {
        return $this->belongsTo(Choice::class);
    }
}

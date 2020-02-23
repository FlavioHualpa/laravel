<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $fillable = [
        'question_id',
        'choice'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function surveyResponses()
    {
        return $this->hasMany(SurveyResponse::class);
    }

    public function deleteAll()
    {
        $this->surveyResponses()->delete();
        $this->delete();
    }
}

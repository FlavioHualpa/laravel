<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'questionnaire_id',
        'question'
    ];

    public function questionnaire()
    {
        return $this->belongsTo(Questionnaire::class);
    }

    public function choices()
    {
        return $this->hasMany(Choice::class);
    }

    public function deleteAll()
    {
        foreach ($this->choices as $choice)
        {
            $choice->deleteAll();
        }

        $this->delete();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class QuestionResponse extends Pivot
{
   protected $fillable = [
      'choice_id',
      'response_id',
      'question_id',
      'response',
   ];

   public function response()
   {
      return $this->belongsTo(Reponse::class);
   }

   public function choice()
   {
      return $this->belongsTo(Choice::class);
   }

   public function question()
   {
      return $this->belongsTo(Question::class);
   }
}

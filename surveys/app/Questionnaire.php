<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
   protected $fillable = [
      'user_id',
      'name'
   ];
   
   public function user()
   {
      return $this->belongsTo(User::class);
   }
   
   public function questions()
   {
      return $this->hasMany(Question::class);
   }
   
   public function surveys()
   {
      return $this->hasMany(Survey::class);
   }
   
   public function deleteAll()
   {
      foreach ($this->questions as $question)
      {
         $question->deleteAll();
      }
      
      $this->surveys()->delete();
      $this->delete();
   }
   
   public function surveyUrl()
   {
      return route(
         'survey.create',
         [ 'questionnaire' => $this->id ]
      );
   }

   public function privateUrl()
   {
      return route(
         'qnr.show',
         [ 'questionnaire' => $this->id ]
      );
   }
}

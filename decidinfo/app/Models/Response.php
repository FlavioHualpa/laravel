<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
   use HasFactory;

   protected $fillable = [
      'survey_id',
      'ip_respondent',
      'email_respondent',
   ];

   public function survey()
   {
      return $this->belongsTo(Survey::class);
   }

   public function question_response()
   {
      return $this->hasMany(QuestionResponse::class);
   }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
   use HasFactory;

   protected $fillable = [
      'section_id',
      'type',
      'params',
      'title',
      'description',
      'required',
   ];

   public function section()
   {
      return $this->belongsTo(Section::class);
   }

   public function choices()
   {
      return $this->hasMany(Choice::class);
   }

   public function question_response()
   {
      return $this->hasMany(QuestionResponse::class);
   }
}

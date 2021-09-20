<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
   use HasFactory;

   protected $fillable = [
      'user_id',
      'title',
      'description',
   ];

   public function user()
   {
      return $this->belongsTo(User::class);
   }

   public function sections()
   {
      return $this->hasMany(Section::class);
   }

   public function responses()
   {
      return $this->hasMany(Response::class);
   }

   public function allQuestions()
   {
      return $this->hasManyThrough(
         Question::class,  // el modelo obtenido
         Section::class    // a través de la sección
      );
   }
}

<?php

namespace App\Http\Controllers;

use App\Question;
use App\Questionnaire;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
   public function store(Request $request)
   {
      $questionnaire = Questionnaire::findOrFail(
         $request->input('questionnaire-id')
      );

      $question = $questionnaire->questions()->create(
         $request->input('question')
      );

      $question->choices()->createMany(
         $request->input('choices')
      );

      return back();
   }

   public function destroy()
   {
      $question = Question::findOrFail(request()->input('question_id'));
      $question->deleteAll();
      // deleteAll borra la pregunta y todas las respuestas
      // de las tablas relacionadas

      return back();
   }
}

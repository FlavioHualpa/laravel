<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use App\Http\Requests\QuestionnaireRequest;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
   }
   
   public function show(Questionnaire $questionnaire)
   {
      if ($questionnaire->user_id != auth()->id())
         return redirect()
            ->route('home')
            ->with('status', 'El cuestionario que quieres ver pertenece a otro usuario');
      
      $questionnaire->load('questions.choices');
      
      return view('questionnaires.show')
         ->with([ 'questionnaire' => $questionnaire ]);
   }
   
   public function create()
   {
      return view('questionnaires.create');
   }
   
   public function store(QuestionnaireRequest $request)
   {
      $questionnaire = auth()->user()->questionnaires()->create(
         $request->all()
      );
      
      return redirect()
         ->route('qnr.show', [ 'questionnaire' => $questionnaire->id ])
         ->with('status', 'Cuestionario creado');
   }
   
   public function destroy()
   {
      $questionnaire = Questionnaire::findOrFail(request()->input('questionnaire_id'));
      
      $questionnaire->deleteAll();
      
      return redirect()
         ->route('home')
         ->with('status', 'Cuestionario eliminado');
   }
   
   public function easyCreate()
   {
      $data = [
         
         'questionnaire' => [
            'name'  => 'Un nuevo cuestionario'
         ],
         
         'question' => [
            'question' => 'Primera pregunta'
         ],
         
         'choices' => [
            ['choice' => 'Respuesta 1'],
            ['choice' => 'Respuesta 2'],
            ['choice' => 'Respuesta 3'],
            ]
         ];
         
         $questionnaire = Questionnaire::find(1);
         $question = $questionnaire->questions()->create($data['question']);
         $question->choices()->createMany($data['choices']);
         
         return 'Pregunta creada!';
      }
   }
   
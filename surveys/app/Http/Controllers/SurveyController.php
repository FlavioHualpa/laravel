<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use App\User;
use App\Mail\ThankYou;
use App\Http\Requests\SurveyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SurveyController extends Controller
{
   public function create(Questionnaire $questionnaire)
   {
      $questionnaire->load('questions.choices');
      
      return view('surveys.create')
         ->with(['questionnaire' => $questionnaire]);
   }

   public function store(Questionnaire $questionnaire, SurveyRequest $request)
   {
      $survey = $questionnaire->surveys()->create(
         $request->input('taker')
      );

      $survey->surveyResponses()->createMany(
         $request->input('responses')
      );

      $recipient = new User;
      $recipient->name = $survey->taker_name;
      $recipient->email = $survey->taker_email;

      Mail::to($recipient)->send(new ThankYou($survey));
      
      session()->flash('taker_name', $request->input('taker.taker_name'));

      return redirect()
         ->route('survey.saved');
   }

   public function saved()
   {
      return view('surveys.saved')
         ->with('name', session('taker_name'));
   }
}

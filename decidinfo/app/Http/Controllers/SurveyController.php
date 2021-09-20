<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Survey;
use App\Models\User;
use App\Helpers\BuildSurvey;

class SurveyController extends Controller
{
   public function index()
   {
      auth()->login(User::first());

      return view('user.index')
         ->with([
            'surveys' => Survey::withCount([
               'sections', 'allQuestions', 'responses'
               ])->latest()
               ->where('user_id', auth()->id())
               ->get()
         ]);
   }

   public function show(BuildSurvey $build)
   {
      return view('surveys.create');
      
      return view('surveys.main')
         ->with(['survey' => $build->getSurvey()]);
   }

   public function create(BuildSurvey $build)
   {
      $build->initialize();

      /*
      $sections = [ 1 => [
         'section' => new Section,
         'questions' => [
            1 => [
               'question' => new Question,
               'choices' => [
                  1 => new Choice
               ]
            ]
         ]
      ]];
      
      foreach ($sections as $section)
      {
         $ns = $survey->sections()->create($section["section"]);
         foreach ($section["questions"] as $question)
         {
            $nq = $ns->questions()->create($question["question"]);
            foreach ($question["choices"] as $choice)
            {
               $nc = $nq->choices()->create($choice);
            }
         }
      }
      */

      return $this->pageRedirector($build);
   }

   public function prevStep(BuildSurvey $build)
   {
      switch ($build->getCurrentPage())
      {
         case 'section':
            $this->validateSection();

            if ($build->getCurrentSectionNumber() == 1)
            {
               $build->setCurrentPage('main');
            }
            else
            {
               $build->goToPrevSection();
            }
            break;
      }

      return $this->pageRedirector($build);
   }

   public function nextStep(BuildSurvey $build)
   {
      switch ($build->getCurrentPage())
      {
         case 'main':
            $build->setSurveyAttribute('title', request('title'));
            $build->setSurveyAttribute('description', request('description'));
            request()->validate($this->mainValidationRules());

            $build->setCurrentPage('section');
            $build->setCurrentSectionNumber('1');
            break;

         case 'section':
            $this->validateSection();
            $build->goToNextSection();
            break;
      }

      return $this->pageRedirector($build);
   }

   protected function pageRedirector(BuildSurvey $build)
   {
      switch ($build->getCurrentPage())
      {
         case 'main':
            return redirect()
               ->route('surveys.main');

         case 'section':
            return redirect()
               ->route('surveys.section');

         default:
            abort(Response::HTTP_BAD_REQUEST);
      }
   }

   protected function validateSection()
   {
      $build = new BuildSurvey;
      $currentSection = $build->getCurrentSectionNumber();

      $build->setCurrentSectionAttribute('title',
         request()->section[$currentSection]["title"]
      );
      $build->setCurrentSectionAttribute('description',
         request()->section[$currentSection]["description"]
      );
      request()->validate($this->sectionValidationRules());
   }

   protected function mainValidationRules()
   {
      return [
         'title' => [ 'required', 'min:3' ],
         'description' => [ 'present' ],
      ];
   }

   protected function sectionValidationRules()
   {
      return [
         'section.*.title' => [ 'required', 'min:3' ],
         'section.*.description' => [ 'present' ],
      ];
   }
}

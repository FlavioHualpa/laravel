<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\BuildSurvey;

class SectionController extends Controller
{
   public function create(BuildSurvey $build)
   {
      return view('surveys.section')
         ->with([
            'section' => $build->getCurrentSection(),
            'currentSection' => $build->getCurrentSectionNumber(),
            'isLastSection' => $build->isCurrentSectionLast()
         ]);
   }
}

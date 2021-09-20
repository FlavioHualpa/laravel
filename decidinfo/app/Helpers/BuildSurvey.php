<?php

namespace App\Helpers;

use App\Models\Section;
use App\Models\Survey;

class BuildSurvey
{
   const BS_CURRENT_PAGE = 'newSurvey.currentPage';
   const BS_CURRENT_SECTION_NUMBER = 'newSurvey.currentSection';
   const BS_TOTAL_SECTIONS = 'newSurvey.totalSections';
   const BS_SURVEY = 'newSurvey.survey';
   const BS_SECTIONS = 'newSurvey.sections';
   
   public function initialize()
   {
      session()->put(self::BS_CURRENT_PAGE, 'main');

      if (session()->missing(self::BS_TOTAL_SECTIONS))
         session()->put(self::BS_TOTAL_SECTIONS, 1);
      
      if (session()->missing(self::BS_CURRENT_SECTION_NUMBER))
         session()->put(self::BS_CURRENT_SECTION_NUMBER, 1);
      
      if (session()->missing(self::BS_SURVEY))
         session()->put(self::BS_SURVEY, new Survey);
      
      if (session()->missing(self::BS_SECTIONS))
         session()->put(self::BS_SECTIONS, [
            1 => $this->createSessionSection()
         ]);
   }

   protected function createSessionSection()
   {
      return [
         'section' => new Section,
         'questions' => []
      ];
   }

   public function getSurvey()
   {
      return session(self::BS_SURVEY);
   }

   public function getSections()
   {
      return session(self::BS_SECTIONS);
   }

   public function getCurrentPage()
   {
      return session(self::BS_CURRENT_PAGE);
   }

   public function getCurrentSectionNumber()
   {
      return session(self::BS_CURRENT_SECTION_NUMBER);
   }

   public function getTotalSectionsNumber()
   {
      return session(self::BS_TOTAL_SECTIONS);
   }

   public function getCurrentSection()
   {
      return session(self::BS_SECTIONS)
         [session(self::BS_CURRENT_SECTION_NUMBER)];
   }

   public function setCurrentPage($page)
   {
      session()->put(self::BS_CURRENT_PAGE, $page);
   }

   public function setCurrentSectionNumber($number)
   {
      session()->put(self::BS_CURRENT_SECTION_NUMBER, $number);
   }

   public function setSurveyAttribute($name, $value)
   {
      $this->getSurvey()->$name = $value;
   }

   public function setCurrentSectionAttribute($name, $value)
   {
      $this->getCurrentSection()["section"]->$name = $value;
   }

   public function goToNextSection()
   {
      session()->put(
         self::BS_CURRENT_SECTION_NUMBER,
         $this->getCurrentSectionNumber() + 1
      );
   }

   public function goToPrevSection()
   {
      session()->put(
         self::BS_CURRENT_SECTION_NUMBER,
         $this->getCurrentSectionNumber() - 1
      );
   }

   public function isCurrentSectionLast()
   {
      return $this->getCurrentSectionNumber() == $this->getTotalSectionsNumber();
   }
}
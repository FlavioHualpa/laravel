<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Survey extends Component
{
   public $currentPage;
   public $currentSection;
   public $title;
   public $description;
   public $sections = [];
   public $showAlert;
   public $alertMessage;
   
   public function mount()
   {
      $this->currentPage = 'main';
      $this->currentSection = 0;
      $this->title = null;
      $this->description = null;
      $this->addSection(0);
   }

   public function updating()
   {
      $this->showAlert = false;
   }
   
   public function addSection($beforeSectionNumber)
   {
      if (count($this->sections) == 1)
      {
         $this->showAlert = true;
         $this->alertMessage = "Por el momento el límite de secciones es de 10";
         return;
      }

      array_splice($this->sections,
         $beforeSectionNumber, 0,
         [ $this->newSection() ]
      );
   }

   public function deleteSection($sectionNumber)
   {
      array_splice($this->sections, $sectionNumber, 1);
   }

   public function addQuestion($beforeQuestionNumber)
   {
      array_splice(
         $this->sections[$this->currentSection]['questions'],
         $beforeQuestionNumber, 0,
         [ $this->newQuestion() ]
      );
   }

   public function deleteQuestion($questionNumber)
   {
      array_splice(
         $this->sections[$this->currentSection]['questions'],
         $questionNumber, 1
      );
   }

   public function addChoice($questionNumber, $beforeChoiceNumber)
   {
      array_splice(
         $this->sections[$this->currentSection]['questions'][$questionNumber]['choices'],
         $beforeChoiceNumber, 0,
         [ $this->newChoice() ]
      );
   }

   public function deleteChoice($questionNumber, $choiceNumber)
   {
      array_splice(
         $this->sections[$this->currentSection]['questions'][$questionNumber]['choices'],
         $choiceNumber, 1
      );
   }

   protected function newSection()
   {
      return [
         'title' => null,
         'description' => null,
         'questions' => [ $this->newQuestion() ]
      ];
   }

   protected function newQuestion()
   {
      return [
         'title' => null,
         'description' => null,
         'type' => 'short_answer',
         'choices' => [ $this->newChoice() ]
      ];
   }

   protected function newChoice()
   {
      return [
         'title' => null
      ];
   }

   protected function questionsInCurrentSection()
   {
      return $this->sections[$this->currentSection]['questions'];
   }

   protected function validateMain()
   {
      $this->validate([
         'title' => [ 'required', 'min:3' ]
      ], [
         'title.required' => 'El título de la encuesta es obligatorio',
         'title.min' => 'El título de la encuesta debe tener al menos 3 caracteres',
      ]);
   }

   protected function validateSection()
   {
      $this->validate([
         'sections.*.title' => [ 'required', 'min:3' ],
         'sections.*.questions.*.title' => [ 'required', 'min:3' ],
      ], [
         'sections.*.title.required' => 'El título de la sección es obligatorio',
         'sections.*.title.min' => 'El título de la sección debe tener al menos 3 caracteres',
         'sections.*.questions.*.title.required' => 'El título de la pregunta es obligatorio',
         'sections.*.questions.*.title.min' => 'El título de la pregunta debe tener al menos 3 caracteres',
      ]);
   }

   public function gotoNextSection()
   {
      switch ($this->currentPage)
      {
         case 'main':
            $this->validateMain();
            $this->currentPage = 'section';
            break;

         case 'section':
            $this->validateSection();
            $this->currentSection++;
            break;
         
         default:
            break;
      }
   }

   public function gotoPrevSection()
   {
      $this->validateSection();
      
      if ($this->currentSection == 0)
      {
         $this->currentPage = 'main';
      }
      else
      {
         $this->currentSection--;
      }
   }

   public function getIsCurrentSectionLastProperty()
   {
      return count($this->sections) == $this->currentSection + 1;
   }

   public function getQuestionsInCurrentSectionProperty()
   {
      return $this->questionsInCurrentSection();
   }

   public function render()
   {
      return view('livewire.survey');
   }
}

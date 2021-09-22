<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Survey;
use App\Models\Section;
use App\Models\Question;

class CreateSurvey extends Component
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

      array_splice($this->sections, 0, 0, [ $this->newSection() ]);
   }

   public function updated($name)
   {
      $this->showAlert = false;

      $fieldName = stripos($name, "choices") !== false ?
         "opción" : (stripos($name, "questions") !== false ?
         "pregunta" : (stripos($name, "sections") !== false ?
         "sección" : "encuesta"));
      
      $this->validateOnly($name, [
         $name => [ 'required', 'min:3' ]
      ], [
         $name . '.required' => 'El título de la ' . $fieldName . ' es obligatorio',
         $name . '.min' => 'El título de la ' . $fieldName . ' debe tener al menos 3 caracteres',
      ]);
   }
   
   public function addSection($beforeSectionNumber)
   {
      $this->validateFields();

      if (count($this->sections) == 10)
      {
         $this->showAlert = true;
         $this->alertMessage = "Por el momento el límite de secciones es de 10";
         return;
      }

      array_splice($this->sections,
         $beforeSectionNumber, 0,
         [ $this->newSection() ]
      );

      if ($this->currentSection < $beforeSectionNumber)
         $this->gotoNextSection();
   }

   public function deleteSection($sectionNumber)
   {
      if (count($this->sections) == 1)
         return;
      
      array_splice($this->sections, $sectionNumber, 1);

      if ($this->currentSection == count($this->sections))
         $this->currentSection--;
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
      if (count($this->sections[$this->currentSection]['questions']) == 1)
         return;
      
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
      if (count($this->sections[$this->currentSection]['questions'][$questionNumber]['choices']) == 1)
         return;
      
      array_splice(
         $this->sections[$this->currentSection]['questions'][$questionNumber]['choices'],
         $choiceNumber, 1
      );
   }

   public function store()
	{
      $this->validateFields();

		$survey = auth()->user()->surveys()->create([
			'title' => $this->title,
			'description' => $this->description,
		]);

		$this->storeSections($survey);
	}

	private function storeSections(Survey $survey)
	{
		foreach ($this->sections as $sectionItem)
		{
			$sectionModel = $survey->sections()->create([
				'title' => $sectionItem["title"],
				'description' => $sectionItem["description"],
			]);

			$this->storeQuestions($sectionModel, $sectionItem["questions"]);
		}
	}

	private function storeQuestions(Section $section, $questions)
	{
		foreach ($questions as $questionItem)
		{
			$questionModel = $section->questions()->create([
				'title' => $questionItem["title"],
				'description' => $questionItem["description"],
				'type' => $questionItem["type"],
				'params' => json_encode($questionItem["params"]),
				'required' => $questionItem["required"],
			]);

			$this->storeChoices($questionModel, $questionItem["choices"]);
		}
	}

   private function storeChoices(Question $question, $choices)
	{
		$choicesArray = [];

		foreach ($choices as $choiceItem)
		{
			switch ($question->type)
			{
				case 'multiple_choice':
				case 'check_boxes':
				case 'dropdown_list':

					$choicesArray[] = [
						'title' => $choiceItem["title"],
					];

					break;
			}
		}

		$question->choices()->createMany($choicesArray);
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
         'params' => [],
         'required' => false,
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

   protected function validateFields()
   {
      switch ($this->currentPage)
      {
         case 'main':

            $this->validate([
               'title' => [ 'required', 'min:3' ]
            ], [
               'title.required' => 'El título de la encuesta es obligatorio',
               'title.min' => 'El título de la encuesta debe tener al menos 3 caracteres',
            ]);

            break;
         
         case 'section':

            $this->validate([
               'sections.*.title' => [ 'required', 'min:3' ],
               'sections.*.questions.*.title' => [ 'required', 'min:3' ],
               'sections.*.questions.*.choices.*.title' => [ 'required', 'min:3' ],
            ], [
               'sections.*.title.required' => 'El título de la sección es obligatorio',
               'sections.*.title.min' => 'El título de la sección debe tener al menos 3 caracteres',
               'sections.*.questions.*.title.required' => 'El título de la pregunta es obligatorio',
               'sections.*.questions.*.title.min' => 'El título de la pregunta debe tener al menos 3 caracteres',
               'sections.*.questions.*.choices.*.title.required' => 'El título de la opción es obligatorio',
               'sections.*.questions.*.choices.*.title.min' => 'El título de la opción debe tener al menos 3 caracteres',
            ]);

            break;
         
         default:
            break;
      }
   }

   public function validateAndGotoNext()
   {
      $this->validateFields();
      $this->gotoNextSection();
   }

   protected function gotoNextSection()
   {
      switch ($this->currentPage)
      {
         case 'main':
            $this->currentPage = 'section';
            break;

         case 'section':
            $this->currentSection++;
            break;
         
         default:
            break;
      }
   }

   public function validateAndGotoPrev()
   {
      $this->validateFields();
      $this->gotoPrevSection();
   }

   protected function gotoPrevSection()
   {
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
      return view('livewire.create-survey');
   }
}

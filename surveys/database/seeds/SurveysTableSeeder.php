<?php

use App\Survey;
use Illuminate\Database\Seeder;

class SurveysTableSeeder extends Seeder
{
   /**
   * Run the database seeds.
   *
   * @return void
   */
   public function run()
   {
      factory(Survey::class, 836)->create()->each(
         function ($survey)
         {
            foreach ($survey->questionnaire->questions as $question)
            {
               $choice = $question->choices->random();
               $survey->surveyResponses()->create([
                  'choice_id' => $choice->id
               ]);
            }
         }
      );
   }
}
   
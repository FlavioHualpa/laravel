<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionResponseTable extends Migration
{
   /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
      Schema::create('question_response', function (Blueprint $table) {
         $table->id();
         $table->foreignId('choice_id')->constrained('choices')->nullable();
         $table->foreignId('response_id')->constrained('responses');
         $table->foreignId('question_id')->constrained('questions');
         $table->text('response');
         $table->timestamps();
      });
   }
   
   /**
   * Reverse the migrations.
   *
   * @return void
   */
   public function down()
   {
      Schema::dropIfExists('question_response');
   }
}

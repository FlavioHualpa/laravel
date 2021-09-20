<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsesTable extends Migration
{
   /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
      Schema::create('responses', function (Blueprint $table) {
         $table->id();
         $table->foreignId('survey_id')->constrained('surveys');
         $table->string('ip_respondent');
         $table->string('email_respondent');
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
      Schema::dropIfExists('responses');
   }
}

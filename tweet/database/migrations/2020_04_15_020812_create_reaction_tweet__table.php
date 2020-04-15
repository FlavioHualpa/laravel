<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReactionTweetTable extends Migration
{
   /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
      Schema::create('reaction_tweet', function (Blueprint $table) {
         $table->id();
         $table->morphs('reactable');
         $table->foreignId('reaction_id');
         $table->foreignId('user_id');
         $table->timestamps();

         $table->foreign('reaction_id')->references('id')->on('reactions');
         $table->foreign('user_id')->references('id')->on('users');
      });
   }
   
   /**
   * Reverse the migrations.
   *
   * @return void
   */
   public function down()
   {
      Schema::dropIfExists('reaction_tweet');
   }
}

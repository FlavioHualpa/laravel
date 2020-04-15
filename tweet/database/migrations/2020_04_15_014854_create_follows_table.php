<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowsTable extends Migration
{
   /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
      Schema::create('follows', function (Blueprint $table) {
         $table->id();
         $table->foreignId('user_id');
         $table->foreignId('follows_id');
         $table->timestamps();

         $table->foreign('user_id')->references('id')->on('users');
         $table->foreign('follows_id')->references('id')->on('users');
      });
   }
   
   /**
   * Reverse the migrations.
   *
   * @return void
   */
   public function down()
   {
      Schema::dropIfExists('follows');
   }
}

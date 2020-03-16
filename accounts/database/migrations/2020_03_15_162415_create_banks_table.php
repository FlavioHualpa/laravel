<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanksTable extends Migration
{
   /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
      Schema::create('banks', function (Blueprint $table) {
         $table->bigIncrements('id');
         $table->unsignedBigInteger('account_id');
         $table->string('code');
         $table->string('name');
         $table->timestamps();
         $table->foreign('account_id')->references('id')->on('accounts');
      });
   }
   
   /**
   * Reverse the migrations.
   *
   * @return void
   */
   public function down()
   {
      Schema::dropIfExists('banks');
   }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankAccountsTable extends Migration
{
   /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
      Schema::create('bank_accounts', function (Blueprint $table) {
         $table->bigIncrements('id');
         $table->unsignedBigInteger('company_id');
         $table->unsignedBigInteger('bank_id');
         $table->string('code');
         $table->string('name');
         $table->string('number');
         $table->timestamps();
         $table->foreign('company_id')->references('id')->on('companies');
         $table->foreign('bank_id')->references('id')->on('banks');
      });
   }
   
   /**
   * Reverse the migrations.
   *
   * @return void
   */
   public function down()
   {
      Schema::dropIfExists('bank_accounts');
   }
}

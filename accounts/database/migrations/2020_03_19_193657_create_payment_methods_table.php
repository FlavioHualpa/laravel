<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentMethodsTable extends Migration
{
   /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
      Schema::create('payment_methods', function (Blueprint $table) {
         $table->bigIncrements('id');
         $table->unsignedBigInteger('company_id');
         $table->unsignedBigInteger('payment_method_type_id');
         $table->string('code');
         $table->string('name');
         $table->timestamps();
         $table->foreign('company_id')->references('id')->on('companies');
         $table->foreign('payment_method_type_id')->references('id')->on('payment_method_types');
      });
   }
   
   /**
   * Reverse the migrations.
   *
   * @return void
   */
   public function down()
   {
      Schema::dropIfExists('payment_methods');
   }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentPaymentMethodTable extends Migration
{
   /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
      Schema::create('payment_payment_method', function (Blueprint $table) {
         $table->bigIncrements('id');
         $table->unsignedBigInteger('payment_id');
         $table->unsignedBigInteger('payment_method_id');
         $table->float('amount');
         $table->string('comment')->nullable();
         $table->text('details')->nullable();
         $table->timestamps();
         $table->foreign('payment_id')->references('id')->on('payments');
         $table->foreign('payment_method_id')->references('id')->on('payment_methods');
      });
   }
   
   /**
   * Reverse the migrations.
   *
   * @return void
   */
   public function down()
   {
      Schema::dropIfExists('payment_payment_method');
   }
}

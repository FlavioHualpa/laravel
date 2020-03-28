<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicePaymentTable extends Migration
{
   /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
      Schema::create('invoice_payment', function (Blueprint $table) {
         $table->bigIncrements('id');
         $table->unsignedBigInteger('invoice_id');
         $table->morphs('applicant');
         $table->float('amount');
         $table->timestamps();
         $table->foreign('invoice_id')->references('id')->on('invoices');
      });
   }
   
   /**
   * Reverse the migrations.
   *
   * @return void
   */
   public function down()
   {
      Schema::dropIfExists('applications');
   }
}

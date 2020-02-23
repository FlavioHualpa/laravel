<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('name');
            $table->text('address');
            $table->text('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('fiscal_id');
            $table->unsignedBigInteger('condition_id');
            $table->unsignedBigInteger('account_id');
            $table->timestamps();
            $table->foreign('condition_id')->references('id')->on('conditions');
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
        Schema::dropIfExists('companies');
    }
}

<?php

use App\Customer;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('name');
            $table->text('address');
            $table->text('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('fiscal_id');
            $table->unsignedBigInteger('condition_id');
            $table->unsignedBigInteger('company_id');
            $table->tinyInteger('status')->default(Customer::STATUS_ACTIVE);
            $table->timestamps();
            $table->foreign('condition_id')->references('id')->on('conditions');
            $table->foreign('company_id')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}

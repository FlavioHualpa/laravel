<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_centers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('address', 100);
            $table->string('city', 100);
            $table->string('state', 100);
            $table->string('zip_code', 10);
            $table->string('telephone', 20);
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
        Schema::dropIfExists('medical_centers');
    }
}

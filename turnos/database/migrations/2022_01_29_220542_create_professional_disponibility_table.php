<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessionalDisponibilityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professional_disponibility', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medical_center_id')->constrained('medical_centers');
            $table->unsignedBigInteger('professional_specialization_id');
            $table->foreign('professional_specialization_id', 'specialization_fk')->references('id')->on('professional_specialization');
            $table->unsignedInteger('week_day');
            $table->time('time');
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
        Schema::dropIfExists('professional_disponibility');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeSeccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_secciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_home')->references('id')->on('home');
            $table->string('titulo1')->nullable();
            $table->string('titulo2')->nullable();
            $table->string('texto_boton')->nullable();
            $table->string('color_boton')->nullable();
            $table->string('url')->nullable();
            $table->string('imagen');
            $table->integer('orden');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home_secciones');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCubitajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cubitajes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_grupo_precio');
            $table->double('kilos', 15, 8);
            $table->double('metros', 15, 8);
            $table->timestamps();

            $table->foreign('id_grupo_precio')->references('id')->on('grupo_precios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cubitajes');
    }
}

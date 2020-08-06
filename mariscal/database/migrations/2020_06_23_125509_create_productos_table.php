<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('imagen');
            $table->integer('orden');
            $table->boolean('privado')->default(false);
            $table->integer('multiplo');
            $table->integer('unidad');
            $table->unsignedBigInteger('id_niv3');
            $table->unsignedBigInteger('id_grupo_precio');
            $table->string('codigo_erp', 20);
            $table->string('codigo_access', 20);
            $table->string('envasamiento_access');
            $table->timestamps();

            $table->foreign('id_niv3')->references('id')->on('menu_niv3');
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
        Schema::dropIfExists('productos');
    }
}

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
            $table->unsignedBigInteger('id_niv3')->references('id')->on('menu_niv3');
            $table->string('codigo_erp');
            $table->string('codigo_access');
            $table->string('envasamiento_access');
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
        Schema::dropIfExists('productos');
    }
}

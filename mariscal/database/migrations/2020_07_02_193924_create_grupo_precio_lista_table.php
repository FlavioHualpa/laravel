<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupoPrecioListaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupo_precio_lista', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_lista')->constraint('listas_de_precios');
            $table->foreignId('id_grupo_precio')->constraint('grupo_precios');
            $table->double('precio', 15, 4);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupo_precio_lista');
    }
}

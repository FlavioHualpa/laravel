<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnvasamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('envasamientos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_niv3')->references('id')->on('menu_niv3');
            $table->unsignedBigInteger('id_unidad')->references('id')->on('unidades');
            $table->double('divisor', 15, 6);
            $table->integer('orden');
            $table->integer('bulto');
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
        Schema::dropIfExists('envasamientos');
    }
}

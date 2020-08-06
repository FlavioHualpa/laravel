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
            $table->foreignId('id_niv3')->constrained('menu_niv3');
            $table->foreignId('id_unidad')->constrained('unidades');
            $table->double('divisor', 15, 6);
            $table->integer('orden');
            $table->boolean('bulto')->default(false);
            $table->boolean('es_interno')->default(false);
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

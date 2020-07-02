<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_enviante')->nullable();
            $table->unsignedBigInteger('id_estado');
            $table->unsignedBigInteger('numero');
            $table->string('mensaje')->nullable();
            $table->timestamps();
            $table->timestamp('sent_at')->nullable();

            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_cliente')->references('id')->on('users');
            $table->foreign('id_enviante')->references('id')->on('users');
            $table->foreign('id_estado')->references('id')->on('estado_pedidos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}

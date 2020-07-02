<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cuit');
            $table->string('razon_social');
            $table->string('email');
            $table->string('domicilio');
            $table->string('localidad');
            $table->string('codigo_postal');
            $table->string('telefono');
            $table->string('codigo_erp');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('id_lista');
            $table->unsignedBigInteger('id_vendedor')->nullable();
            $table->unsignedBigInteger('id_rol');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_lista')->references('id')->on('listas_de_precios');
            $table->foreign('id_vendedor')->references('id')->on('users');
            $table->foreign('id_rol')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

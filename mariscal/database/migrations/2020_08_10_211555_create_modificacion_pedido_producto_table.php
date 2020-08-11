<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModificacionPedidoProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modificacion_pedido_producto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pedido_producto')->constrained('pedido_producto');
            $table->foreignId('id_estado_pedido')->constrained('estado_pedidos');
            $table->string('tipo', 20);  // 'cantidad' o 'precio'
            $table->double('valor_anterior', 15, 4);
            $table->double('valor_nuevo', 15, 4);
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modificacion_pedido_producto');
    }
}

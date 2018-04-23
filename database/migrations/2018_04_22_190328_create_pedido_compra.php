<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidoCompra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('pedido_compra', function (Blueprint $table) {
        $table->increments('id');
        $table->string('nome');
        $table->date('data');
        $table->text('situacao');
        $table->text('fornecedor');
        $table->text('produto');



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
        Schema::dropIfExists('pedido_compra');
    }
}

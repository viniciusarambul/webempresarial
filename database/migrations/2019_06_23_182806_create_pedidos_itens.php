<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosItens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('pedidoitens', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('idFornecedor')->nullable();
        $table->enum("tipo_pedido",['COMPRA','VENDA']);
        $table->integer('idPedido');
        $table->integer('idProduto');
        $table->integer('quantidade');
        $table->double('preco');

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
        Schema::dropIfExists('pedidoitens');
        

    }
}

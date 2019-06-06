<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePedidosTitulos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('pedidotitulos', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('idFornecedor')->nullable();
        $table->enum("tipo_pedido",['COMPRA','VENDA'])->nullable();
        $table->integer('idPedido');
        $table->text('situacao');
        $table->date('dataEmissao');
        $table->date('dataVencimento');
        $table->text('tipoPagamento');
        $table->text('parcelas')->nullable();
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
        Schema::dropIfExists('pedidotitulos');
    }
}

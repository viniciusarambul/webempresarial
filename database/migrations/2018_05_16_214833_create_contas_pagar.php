<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContasPagar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('contapagar', function (Blueprint $table) {
        $table->increments('id');
        $table->string('descricao');
        $table->date('data');
        $table->text('situacao');
        $table->text('idFornecedor')->nullable();
        $table->text('idProduto')->nullable();
        $table->text('quantidade')->nullable();
        $table->text('idPedidoVenda')->nullable();
        $table->text('parcelas')->nullable();
        $table->text('tipoPagamento')->nullable();
        $table->text('valor')->nullable();



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
        Schema::dropIfExists('contapagar');
    }
}
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaClientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('clientes', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nome');
          $table->string('sobrenome')->nullable();
          $table->string('status')->nullable();
          $table->text('telefone')->nullable();
          $table->text('email')->nullable();
          $table->text('cidade')->nullable();
          $table->text('estado')->nullable();
          $table->text('cep')->nullable();
          $table->text('cpf')->nullable();
          $table->text('cnpj')->nullable();
          $table->text('razao')->nullable();
          $table->text('bairro')->nullable();
          $table->text('numero')->nullable();
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
        Schema::dropIfExists('clientes');
    }
}

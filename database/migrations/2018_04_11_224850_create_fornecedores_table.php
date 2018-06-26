<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFornecedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fornecedores', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nome');
          $table->string('sobrenome');
          $table->text('telefone');
          $table->text('email');
          $table->text('cidade');
          $table->text('estado');
          $table->text('cep');
          $table->text('bairro');
          $table->text('numero');
          $table->text('razaosocial')->nullable();
          $table->text('cpf')->nullable();
          $table->text('cnpj')->nullable();
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
        Schema::dropIfExists('fornecedores');
    }
}

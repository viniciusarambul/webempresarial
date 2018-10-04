<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaUsuariosPermissoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('usuarios_permissoes', function (Blueprint $table) {
           $table->integer('usuario_id');
           $table->integer('permissao_id');
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
         Schema::dropIfExists('usuarios_permissoes');
     }
  }

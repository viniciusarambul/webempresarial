<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaGruposPermissoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('grupos_permissoes', function (Blueprint $table) {
           $table->integer('grupo_id');
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
         Schema::dropIfExists('grupos');
     }
  }
